<?php

namespace App\Helpers\NetLicensing;


use NetLicensing\Context;

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
}