<?php

namespace App\Helpers\NetLicensing;

use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlicShopToken;
use App\Models\NetLicensing\NlicValidation;
use Carbon\Carbon;
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

        $securityMode = is_null($securityMode) ? config('netlicensing.connection.security_mode') : $securityMode;

        switch (strtoupper($securityMode)) {
            case Context::APIKEY_IDENTIFICATION:
                $context->setApiKey(config('netlicensing.connection.api_key'));
                $context->setSecurityMode(Context::APIKEY_IDENTIFICATION);
                break;
            case Context::BASIC_AUTHENTICATION:
                $context->setUsername(config('netlicensing.connection.username'));
                $context->setPassword(config('netlicensing.connection.password'));
                $context->setSecurityMode(Context::BASIC_AUTHENTICATION);
                break;
        }

        return $context;
    }

    public function validate(User $user)
    {
        $licenseeName = $user->licensee_name;
        $licenseeNumber = $user->licensee_number;
        $productNumber = config('netlicensing.product_number');

        $nlicValidator = $user->nlicValidation;
        $nlicValidator = ($nlicValidator) ? $nlicValidator : new NlicValidation(['user_id' => $user->id, 'ttl' => Carbon::now()]);

        if ($nlicValidator->isExpired()) {

            $validationParameters = new ValidationParameters();
            $validationParameters->setLicenseeName($licenseeName);
            $validationParameters->setProductNumber($productNumber);

            $validationResult = LicenseeService::validate(app('netlicensing')->context(), $licenseeNumber, $validationParameters);
            $validations = $validationResult->getValidations();

            foreach ($validations as &$validation) {
                $validation['valid'] = ($validation['valid'] == 'true') ? true : false;
            }

            $nlicValidator->validation_result = $validations;

            //get ttl
            $nlicValidator->ttl = new Carbon((string)NetLicensingService::getInstance()->lastCurlInfo()->response['ttl']);

            $nlicValidator->save();

            $user->load('nlicValidation');
        }

        return $nlicValidator;
    }

    public function createShopToken(User $user, $successUrl = null, $cancelUrl = null, $successUrlTitle = null, $cancelUrlTitle = null)
    {
        $successUrl = ($successUrl) ? $successUrl : config('netlicensing.defaults.shop.success_url');
        $cancelUrl = ($cancelUrl) ? $cancelUrl : config('netlicensing.defaults.shop.cancel_url');
        $successUrlTitle = ($successUrlTitle) ? $successUrlTitle : config('netlicensing.defaults.shop.success_url_title');
        $cancelUrlTitle = ($cancelUrlTitle) ? $cancelUrlTitle : config('netlicensing.defaults.shop.success_url_title');

        //find existed token
        $query = $user->nlicShopTokens();

        if ($successUrl) $query->where('success_url', $successUrl);
        if ($cancelUrl) $query->where('cancel_url', $cancelUrl);
        if ($successUrlTitle) $query->where('success_url_title', $successUrlTitle);
        if ($cancelUrlTitle) $query->where('cancel_url_title', $cancelUrlTitle);

        $nlicShopToken = $query->first();

        if ($nlicShopToken && $nlicShopToken->isExpired()) {
            $nlicShopToken->delete();
            $nlicShopToken = null;
        }

        if (!$nlicShopToken) {

            $nlicShopToken = new NlicShopToken(['user_id' => $user->id]);

            $token = new Token();
            $token->setTokenType('SHOP');
            $token->setLicenseeNumber($user->licensee_number);

            if ($successUrl) $token->setSuccessURL($successUrl);
            if ($cancelUrl) $token->setCancelURL($cancelUrl);
            if ($successUrlTitle) $token->setSuccessURLTitle($successUrlTitle);
            if ($cancelUrlTitle) $token->setCancelURLTitle($cancelUrlTitle);

            $token = TokenService::create(app('netlicensing')->context(), $token);

            $nlicShopToken->number = $token->getNumber();
            $nlicShopToken->expires = new Carbon($token->getExpirationTime());
            $nlicShopToken->success_url = $token->getSuccessURL();
            $nlicShopToken->cancel_url = $token->getCancelURL();
            $nlicShopToken->success_url_title = $token->getSuccessURLTitle();
            $nlicShopToken->cancel_url_title = $token->getCancelURLTitle();
            $nlicShopToken->shop_url = $token->getShopURL();

            $nlicShopToken->save();

            $user->load('nlicShopTokens');
        }

        return $nlicShopToken;
    }
}