<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    //
    public function getPackage($type)
    {
        //
        // dd('asdasf');
        $query = Package::where('type', $type)->get();
        return response()->json($query);
    }
}
