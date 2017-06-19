<?php

namespace App\Http\Middleware;

use App\Models\NetLicensing\NlicShopToken;
use App\Models\NetLicensing\NlicValidation;
use Carbon\Carbon;
use Closure;
use NetLicensing\LicenseeService;
use NetLicensing\NetLicensingService;
use NetLicensing\Token;
use NetLicensing\TokenService;
use NetLicensing\ValidationParameters;
use Illuminate\Support\Facades\Auth;

class NlicProtection
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $productModuleNumber
     * @param null $failedRouteName
     * @param null $successRouteName
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next, $productModuleNumber, $failedRouteName = null, $successRouteName = null)
    {

        //check if user authenticate
        if (!Auth::guard()->check()) {
            return redirect()->route('login');
        }

        //skip if user has role administrator
//        $exceptRoles = config('netlicensing.except_roles');
//        if ($exceptRoles && auth()->user()->hasRoles($exceptRoles)) return $next($request);

        $licenseeName = auth()->user()->getAttribute(config('netlicensing.defaults.licensee.name'));
        $licenseeNumber = auth()->user()->getAttribute(config('netlicensing.defaults.licensee.number'));
        $productNumber = config('netlicensing.product_number');

        $nlicValidator = auth()->user()->nlicValidation;
        $nlicValidator = ($nlicValidator) ? $nlicValidator : new NlicValidation(['user_id' => auth()->id(), 'ttl' => Carbon::now()]);

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
        }

        if (!$nlicValidator->isValid($productModuleNumber)) {

            if ($failedRouteName) {
                return redirect()->route($failedRouteName, ['licensee' => $licenseeNumber, 'dest' => url()->current()]);
            }

            //create shop token

            /** @var  $token Token */
            $nlicShopToken = (auth()->user()->nlicShopToken) ? auth()->user()->nlicShopToken : new NlicShopToken(['user_id' => auth()->id()]);

            if ($nlicShopToken->isExpired()) {

                $token = app('netlicensing')->shopToken($licenseeNumber);
                $token->setSuccessURL($token->getSuccessURL(url()->current()));
                $token->setCancelURL($token->getCancelURL(url('/')));

                $token = TokenService::create(app('netlicensing')->context(), $token);

                $nlicShopToken->number = $token->getNumber();
                $nlicShopToken->expires = new Carbon($token->getExpirationTime());
                $nlicShopToken->shop_url = $token->getShopURL();
                $nlicShopToken->save();
            }

            return redirect($nlicShopToken->shop_url);
        }

        if ($successRouteName) {
            return redirect()->route($successRouteName, ['licensee' => $licenseeNumber, 'dest' => url()->current()]);
        }

        return $next($request);
    }
}
