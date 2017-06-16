<?php

namespace App\Http\Controllers\NetLicensing;

use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlShopToken;
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

        $nlShopToken = ($user->nlShopToken) ? $user->nlShopToken : new NlShopToken(['user_id' => $user->id]);

        //create shop token
        if ($nlShopToken->isExpired()) {

            $token = nl_shop_token($licenseeNumber, route('netlisensing.demo.shop.success', ['dest'=>$request->get('dest')]));
            $token = TokenService::create(app('netlicensing')->context(), $token);

            $nlShopToken->number = $token->getNumber();
            $nlShopToken->expires = new Carbon($token->getExpirationTime());
            $nlShopToken->shop_url = $token->getShopURL();
            $nlShopToken->save();
        }

        return view('netlicensing.shop')->with('shop_url', $nlShopToken->shop_url);
    }

    public function successShopRedirect(Request $request)
    {
        /** @var  $user User */
        $user = $request->user();

        //refresh nl validation
        if($user->nlValidation)  $user->nlValidation->delete();

        return redirect($request->get('dest'));
    }
}
