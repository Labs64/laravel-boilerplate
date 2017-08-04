<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users' => \DB::table('users')->count(),
            'users_unconfirmed' => \DB::table('users')->where('confirmed', false)->count(),
            'users_inactive' => \DB::table('users')->where('active', false)->count(),
            'memberships' => \DB::table('protection_validations')->count(),
        ];

        return view('admin.dashboard', ['counts' => $counts]);
    }


    public function getRegisteredChartData(Request $request)
    {
        $users = User::get();

        $data = collect();

        /** @var  $user User */
        foreach ($users as $user) {

            $createdAt = $user->created_at->format('Y-m-d');

            $data->put($createdAt, $data->get($createdAt, 0) + 1);
        }

        return response($data->toArray());
    }
}
