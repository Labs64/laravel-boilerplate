<?php

namespace App\Http\Controllers;

use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlicValidation;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'failed', 'beforeSuccessRedirect']]);
    }

    public function index(Request $request)
    {
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.before.redirect', ['dest' => url()->current()])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
        ]);
    }

    public function failed(Request $request)
    {
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.before.redirect', ['dest' => $request->get('dest')])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
        ]);
    }

    public function beforeSuccessRedirect(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        //refresh nl validation
        if ($user->nlicValidation) $user->nlicValidation->delete();

        nlic_validate($request->user());

        return redirect($request->get('dest'));
    }
}
