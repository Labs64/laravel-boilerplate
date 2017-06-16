<?php

namespace App\Helpers\NetLicensing;

use NetLicensing\Context;
use NetLicensing\Token;

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

    public function shopToken($licenseeNumber, $successUrl = null, $cancelUrl = null, $successUrlTitle = null, $cancelUrlTitle = null)
    {
        //create shop token
        $successUrl = ($successUrl) ? $successUrl : config('netlicensing.defaults.shop.success_url');
        $cancelUrl = ($cancelUrl) ? $cancelUrl : config('netlicensing.defaults.shop.cancel_url');
        $successUrlTitle = ($successUrlTitle) ? $successUrlTitle : config('netlicensing.defaults.shop.success_url_title');
        $cancelUrlTitle = ($cancelUrlTitle) ? $cancelUrlTitle : config('netlicensing.defaults.shop.success_url_title');

        if (!$successUrl) $successUrl = url()->current();
        if (!$cancelUrl) $cancelUrl = url('/');

        $token = new Token();
        $token->setTokenType('SHOP');
        $token->setLicenseeNumber($licenseeNumber);

        if ($successUrl) $token->setSuccessURL($successUrl);
        if ($cancelUrl) $token->setCancelURL($cancelUrl);
        if ($successUrlTitle) $token->setSuccessURLTitle($successUrlTitle);
        if ($cancelUrlTitle) $token->setCancelURLTitle($cancelUrlTitle);

        return $token;
    }
}