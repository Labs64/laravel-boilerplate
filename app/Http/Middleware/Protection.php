<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use NetLicensing\Context;
use NetLicensing\NetLicensingService;
use NetLicensing\RestException;

class Protection
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param $productModuleNumber
     * @param null $failedRouteName
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next, $productModuleNumber, $failedRouteName)
    {
        //check if user authenticate
        if (!Auth::guard()->check()) {
            return redirect()->route('login');
        }

        try {
            if (!auth()->user()->hasAccess($productModuleNumber)) {
                return redirect()->route($failedRouteName, [
                    'dest' => url()->current(),
                    'product_module_number' => $productModuleNumber,
                ]);
            }
        } catch (\Exception $e) {
            if ($e instanceof RestException) {

                $authError = false;
                $wiki = 'Check out troubleshooting page at https://github.com/Labs64/laravel-boilerplate/wiki/NetLicensing-Connection-Error';

                if (NetLicensingService::getInstance()->lastCurlInfo()->httpStatusCode == 401) {
                    $authError = true;
                }

                switch (env('LABS64_NETLICENSING_SECURITY_MODE')) {
                    case Context::BASIC_AUTHENTICATION:
                        if (empty(env('LABS64_NETLICENSING_USERNAME')) || empty('LABS64_NETLICENSING_PASSWORD')) {
                            $authError = true;
                        }
                        break;
                    case Context::APIKEY_IDENTIFICATION:
                        if (empty(env('LABS64_NETLICENSING_APIKEY'))) {
                            $authError = true;
                        }
                        break;
                }

                if ($authError) throw new RestException($e->getMessage() . '; ' . $wiki);;
            }
        }

        return $next($request);
    }
}
