<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class APIController extends Controller
{
    //
    public function getPackage($type)
    {
        //
        // dd('asdasf');
        $query = Package::where('name', $type)->get();
        return response()->json($query);
    }

    public function getBooking($time_from,$time_to,$id,$category)
    {
        //
     
      $packid =  DB::table('package')
                ->where('name', '=',  $id)
                ->where('category_id','=',$category)
                ->get()->first();
     
      $checkAvailable = DB::table('bookings')
                ->where('time_from', '=',  $time_from)
                ->where('time_to','=',$time_to)
                ->where('package_id','=',$packid->id)
                ->get();

        
        return response()->json($checkAvailable);
    }
    public function getBookingPrice($id,$category)
    {
        //
     
      $package =  DB::table('package')
                ->where('name', '=',  $id)
                ->where('category_id','=',$category)
                ->get()->first();
             
        return response()->json($package);
    }
}
