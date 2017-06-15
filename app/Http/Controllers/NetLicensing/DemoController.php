<?php

namespace App\Http\Controllers\NetLicensing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use NetLicensing\Token;
use NetLicensing\TokenService;

class DemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('netlicensing:' . config('netlicensing.demo.product_module_number') . ',netlisensing.demo.shop', ['except' => ['shop']]);
    }

    public function index(Request $request)
    {
        return view('netlicensing.demo');
    }

    public function shop($licenseeNumber, Request $request)
    {

        //create shop token
        $token = new Token();
        $token->setTokenType('SHOP');
        $token->setLicenseeNumber($licenseeNumber);
        $token->setSuccessURL($request->get('dest', url('/')));
        $token->setCancelURL(url('/'));
        $token->setSuccessURLTitle(config('app.name'));

        $token = TokenService::create(nlic_context(), $token);

        return view('netlicensing.shop')->with('token', $token);
    }
}
