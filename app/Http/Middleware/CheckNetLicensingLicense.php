<?php

namespace App\Http\Middleware;

use Closure;
use NetLicensing\Context;
use NetLicensing\LicenseeService;
use NetLicensing\ValidationParameters;
use Illuminate\Support\Facades\Auth;

class CheckNetLicensingLicense
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $productModuleNumber
     * @return mixed
     */
    public function handle($request, Closure $next, $productModuleNumber, $shopRouteName)
    {

        //check if user authenticate
        if (!Auth::guard()->check()) {
            return redirect()->route('login');
        }

        //skip if user has role administrator
//        if (!auth()->user()->hasRole('administrator')) {

            $licenseeName = auth()->user()->getAttribute(config('netlicensing.defaults.licensee.name'));
            $licenseeNumber = auth()->user()->getAttribute(config('netlicensing.defaults.licensee.name'));
            $productNumber = config('netlicensing.product_number');

            $validationParameters = new ValidationParameters();
            $validationParameters->setLicenseeName($licenseeName);
            $validationParameters->setProductNumber($productNumber);

            $validationResult = LicenseeService::validate(app('netlicensing')->context(), $licenseeNumber, $validationParameters);
            $validators = collect($validationResult->getValidations())->mapWithKeys(function ($item) {
                return [$item['productModuleNumber'] => ($item['valid'] != 'true') ? true : false];
            });

            if ($validators->get($productModuleNumber)) {
                return redirect()->route($shopRouteName, ['licensee' => $licenseeNumber, 'dest' => url()->current()]);
            }
//        }

        return $next($request);
    }
}
