<?php

namespace App\Http\Controllers;

use App\Models\Auth\User\User;
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
<<<<<<< HEAD
        /** @var  $user User */
        $user = $request->user();
        $user->load(['nlicValidation']);

        $membership = collect([
            'valid' => null,
            'shopUrl' => null,
            'expires' => null,
=======
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.order.confirmation', ['dest' => url()->current()])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
>>>>>>> 58117047047f3980f7cafa09ed1f103726f2a599
        ]);

        //if user has role administrator
        $exceptRoles = config('netlicensing.except_roles');
        if ($exceptRoles && $user->hasRoles($exceptRoles)) {
            $membership->put('valid', true);
        } else {
            if ($user->nlicValidation) {
                $validationResult = collect($user->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number')));

                $membership->put('valid', $validationResult->get('valid'));
                $membership->put('expires', $validationResult->get('expires'));

                $nlicShopToken = nlic_shop_token($user, route('netlisensing.membership.before.redirect', ['dest' => url()->current()]));

                $membership->put('shopUrl', $nlicShopToken->shop_url);
            }
        }

        return view('membership')->with($membership->toArray());
    }

    public function failed(Request $request)
    {
<<<<<<< HEAD
        /** @var  $user User */
        $user = $request->user();
        $user->load(['nlicValidation']);

        $membership = collect([
            'valid' => null,
            'shopUrl' => null,
            'expires' => null,
=======
        return view('membership')->with([
            'nlic_shop_token' => nlic_shop_token($request->user(), route('netlisensing.membership.order.confirmation', ['dest' => $request->get('dest')])),
            'nlic_validation' => collect($request->user()->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number'))),
            'user' => $request->user()
>>>>>>> 58117047047f3980f7cafa09ed1f103726f2a599
        ]);

        if ($user->nlicValidation) {
            $validationResult = collect($user->nlicValidation->getValidationResult(config('netlicensing.membership.product_module_number')));

            $membership->put('valid', $validationResult->get('valid'));
            $membership->put('expires', $validationResult->get('expires'));

            $nlicShopToken = nlic_shop_token($user, route('netlisensing.membership.before.redirect', ['dest' => $request->get('dest')]));

            $membership->put('shopUrl', $nlicShopToken->shop_url);
        }

        return view('membership')->with($membership->toArray());
    }

    public function orderConfirmation(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        if ($user->nlicValidation) {
            $user->nlicValidation->ttl = Carbon::now();
            $user->nlicValidation->save();
        }

        return redirect($request->get('dest', '/'));
    }
}
