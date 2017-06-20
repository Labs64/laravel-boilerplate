<?php

namespace App\Helpers\Protection;

use App\Models\Auth\User\User;
use App\Models\Protection\ProtectionShopToken;
use App\Models\Protection\ProtectionValidation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use NetLicensing\Context;
use NetLicensing\LicenseeService;
use NetLicensing\NetLicensingService;
use NetLicensing\Token;
use NetLicensing\TokenService;
use NetLicensing\ValidationParameters;

class NetLicensing
{
    public function context($securityMode = null)
    {
        $context = new Context();

        $securityMode = is_null($securityMode) ? config('protection.connection.security_mode') : $securityMode;

        switch (strtoupper($securityMode)) {
            case Context::APIKEY_IDENTIFICATION:
                $context->setApiKey(config('protection.connection.api_key'));
                $context->setSecurityMode(Context::APIKEY_IDENTIFICATION);
                break;
            case Context::BASIC_AUTHENTICATION:
                $context->setUsername(config('protection.connection.username'));
                $context->setPassword(config('protection.connection.password'));
                $context->setSecurityMode(Context::BASIC_AUTHENTICATION);
                break;
        }

        return $context;
    }

    public function validate(User $user)
    {
        $licenseeName = $user->licensee_name;
        $licenseeNumber = $user->licensee_number;
        $productNumber = config('protection.product_number');

        $protectionValidation = $user->protectionValidation;
        $protectionValidation = ($protectionValidation) ? $protectionValidation : new ProtectionValidation(['ttl' => Carbon::now()]);

        if ($protectionValidation->isExpired()) {
            $validationParameters = new ValidationParameters();
            $validationParameters->setLicenseeName($licenseeName);
            $validationParameters->setProductNumber($productNumber);

            $validationResult = LicenseeService::validate($this->context(), $licenseeNumber, $validationParameters);
            $validations = $validationResult->getValidations();

            foreach ($validations as &$validation) {
                $validation['valid'] = ($validation['valid'] == 'true') ? true : false;
            }

            $protectionValidation->validation_result = $validations;

            //get ttl
            $protectionValidation->ttl = new Carbon((string)NetLicensingService::getInstance()->lastCurlInfo()->response['ttl']);

            $protectionValidation->user()->associate($user);
            $protectionValidation->save();

            $user->load('protectionValidation');
        }

        return $protectionValidation;
    }

    public function createShopToken(User $user, $successUrl = null, $cancelUrl = null, $successUrlTitle = null, $cancelUrlTitle = null)
    {
        $successUrl = ($successUrl) ? $successUrl : config('protection.defaults.shop.success_url');
        $cancelUrl = ($cancelUrl) ? $cancelUrl : config('protection.defaults.shop.cancel_url');
        $successUrlTitle = ($successUrlTitle) ? $successUrlTitle : config('protection.defaults.shop.success_url_title');
        $cancelUrlTitle = ($cancelUrlTitle) ? $cancelUrlTitle : config('protection.defaults.shop.cancel_url_title');

        /**
         * find existed token
         * @var  $query Builder
         */
        $query = $user->protectionShopTokens();

        if ($successUrl) $query->where('success_url', $successUrl);
        if ($cancelUrl) $query->where('cancel_url', $cancelUrl);
        if ($successUrlTitle) $query->where('success_url_title', $successUrlTitle);
        if ($cancelUrlTitle) $query->where('cancel_url_title', $cancelUrlTitle);

        $protectionShopToken = $query->first();

        if ($protectionShopToken && $protectionShopToken->isExpired()) {
            $protectionShopToken->delete();
            $protectionShopToken = null;
        }

        if (!$protectionShopToken) {

            $protectionShopToken = new ProtectionShopToken(['user_id' => $user->id]);

            $token = new Token();
            $token->setTokenType('SHOP');
            $token->setLicenseeNumber($user->licensee_number);

            if ($successUrl) $token->setSuccessURL($successUrl);
            if ($cancelUrl) $token->setCancelURL($cancelUrl);
            if ($successUrlTitle) $token->setSuccessURLTitle($successUrlTitle);
            if ($cancelUrlTitle) $token->setCancelURLTitle($cancelUrlTitle);

            $token = TokenService::create($this->context(), $token);

            $protectionShopToken->number = $token->getNumber();
            $protectionShopToken->expires = new Carbon($token->getExpirationTime());
            $protectionShopToken->success_url = $token->getSuccessURL();
            $protectionShopToken->cancel_url = $token->getCancelURL();
            $protectionShopToken->success_url_title = $token->getSuccessURLTitle();
            $protectionShopToken->cancel_url_title = $token->getCancelURLTitle();
            $protectionShopToken->shop_url = $token->getShopURL();

            $protectionShopToken->user()->associate($user);
            $protectionShopToken->save();

            $user->load('protectionShopTokens');
        }

        return $protectionShopToken;
    }
}
