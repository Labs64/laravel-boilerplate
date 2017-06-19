<?php

namespace App\Http\Controllers\NetLicensing;

use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlicShopToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use NetLicensing\TokenService;

class DemoController extends Controller
{
    public function index(Request $request)
    {
        return view('netlicensing.demo');
    }

    public function shop($licenseeNumber, Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        $nlicShopToken = ($user->nlShopToken) ? $user->nlShopToken : new NlicShopToken(['user_id' => $user->id]);

        //create shop token
        if ($nlicShopToken->isExpired()) {

            $token = nl_shop_token($licenseeNumber, route('netlisensing.demo.shop.success', ['dest'=>$request->get('dest')]));
            $token = TokenService::create(app('netlicensing')->context(), $token);

            $nlicShopToken->number = $token->getNumber();
            $nlicShopToken->expires = new Carbon($token->getExpirationTime());
            $nlicShopToken->shop_url = $token->getShopURL();
            $nlicShopToken->save();
        }

        return view('netlicensing.shop')->with('shop_url', $nlicShopToken->shop_url);
    }

    public function successShopRedirect(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        //refresh nl validation
        if($user->nlicValidation)  $user->nlicValidation->delete();

        return redirect($request->get('dest'));
    }
}
