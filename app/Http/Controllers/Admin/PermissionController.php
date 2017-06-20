<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use Illuminate\Http\Request;

class PermissionController
{
    public function index(Request $request)
    {
        $users = User::with(['roles', 'protectionValidation'])->sortable(['email' => 'asc'])->paginate();
        return view('admin.permissions', ['users' => $users]);
    }

    public function repeat(User $user, Request $request)
    {
        $protectionValidation = protection_validate($user);

        if ($request->expectsJson()) return response($protectionValidation->toArray());

        return redirect()->back();
    }
}
