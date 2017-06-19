<?php

namespace App\Http\Controllers\Admin;


use App\Models\Auth\User\User;
use App\Models\NetLicensing\NlicValidation;
use Illuminate\Http\Request;

class PermissionController
{
    public function index(Request $request)
    {
        $users = User::with(['roles', 'nlicValidation'])->sortable(['email' => 'asc'])->paginate();
        return view('netlicensing.permissions', ['users' => $users]);
    }

    public function repeat(User $user, Request $request)
    {
        /** @var  $nlicValidation NlicValidation */
        $nlicValidation = nlic_validate($user);

        if ($request->expectsJson()) return response($nlicValidation->toArray());

        return redirect()->back();
    }
}