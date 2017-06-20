<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        if (!auth()->user()->hasAccess($productModuleNumber)){
            return redirect()->route($failedRouteName, [
                'dest' => url()->current(),
                'product_module_number' => $productModuleNumber,
            ]);
        }

        return $next($request);
    }
}
