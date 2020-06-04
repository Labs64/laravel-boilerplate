<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return RedirectResponse|mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if the session does not have 'authenticated' forget the user and redirect to login
        if ($request->session()->get('authenticated',true) == true)
        {
            return $next($request);
        }
        $request->session()->forget('authenticated');
        $request->session()->forget('user');
        return redirect()->action("LoginController@showLoginForm")->with('error', 'Your session has expired.');
    }
}
