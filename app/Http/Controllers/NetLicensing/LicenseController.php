<?php

namespace App\Http\Controllers\NetLicensing;

use App\Models\Auth\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use NetLicensing\LicenseeService;
use NetLicensing\ValidationParameters;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles')->sortable(['email' => 'asc'])->paginate();


        $validationParameters = new ValidationParameters();
        $validationParameters->setProductNumber(config('netlicensing.product_number'));

        /** @var  $user User */
        foreach ($users as $user) {
            $validationParameters->setLicenseeName($user->getAttribute(config('netlicensing.defaults.licensee.name')));

            $validationResult = LicenseeService::validate(nlic_context(), $user->getAttribute(config('netlicensing.defaults.licensee.name')), $validationParameters);

            $validators = collect($validationResult->getValidations())->mapWithKeys(function ($item) {
                $item['valid'] = ($item['valid'] == 'true' ? true : false);
                $item['expires'] = (isset($item['expires'])) ? new Carbon($item['expires']) : null;
                return [$item['productModuleNumber'] = $item];

            });

            $user->setAttribute('license', $validators)->syncOriginalAttribute('license');
        }


        return view('netlicensing.license', ['users' => $users]);
    }
}
