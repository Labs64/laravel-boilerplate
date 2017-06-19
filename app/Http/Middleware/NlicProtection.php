<?php

namespace App\Http\Middleware;

use App\Models\NetLicensing\NlicValidation;
use Closure;
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
    public function handle($request, Closure $next, $productModuleNumber, $failedRouteName, $successRouteName = null)
    {
        //check if user authenticate
        if (!Auth::guard()->check()) {
            return redirect()->route('login');
        }

        //skip if user has role administrator
        $exceptRoles = config('netlicensing.except_roles');
        if ($exceptRoles && auth()->user()->hasRoles($exceptRoles)) return $next($request);

        /** @var  $nlicValidation NlicValidation */
        $nlicValidation = app('netlicensing')->validate(auth()->user());

        $parameters = [
            'dest' => url()->current(),
            'product_module_number' => $productModuleNumber,
            'validation' => $nlicValidation->isValid($productModuleNumber)
        ];

        if (!$nlicValidation->isValid($productModuleNumber)) return redirect()->route($failedRouteName, $parameters);

        if ($successRouteName) return redirect()->route($successRouteName, $parameters);

        return $next($request);
    }
}
