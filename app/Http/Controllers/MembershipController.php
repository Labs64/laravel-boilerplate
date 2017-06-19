<?php

namespace App\Http\Controllers;

use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlicValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'failed', 'orderConfirmation']]);
    }

    public function index(Request $request)
    {
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.order.confirmation', ['dest' => url()->current()])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
        ]);
    }

    public function failed(Request $request)
    {
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.order.confirmation', ['dest' => $request->get('dest')])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
        ]);
    }

    public function orderConfirmation(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        $user->nlicValidation->ttl = Carbon::now();
        $user->nlicValidation->save();

        return redirect($request->get('dest'));
    }
}
