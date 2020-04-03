<?php

namespace App\Http\Controllers\Customer;
use Carbon\Carbon as Carbon;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Auth\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu()
    {
        $packages=Package::select('name','type','description','category_id','price','active','created_at','updated_at')->groupBy('name')->orderBy('type', 'asc')->get();
        return view('customer.booking.menu', compact('packages'));
    }
    public function index()
    {
        //
        if (!\Auth::check())
        return view('layouts.unauthorized');
        $bookings = DB::table('bookings')
            ->join('package', 'package.id', '=', 'bookings.package_id')
            ->join('users', 'users.id', '=', 'bookings.customer_id')
            ->select('bookings.*', 'package.name as packageName','package.price', 'users.email')
            ->get();
            
        $id=\Auth::user()->id;
        // $bookings = Booking::where('customer_id', $id)->get();
        // $packages = Package::get();
        return view('customer.booking.index',compact('bookings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function invoice(Request $request)
    {
        //
    }

    public function submit(Request $request)
    {
        //

        $id=\Auth::user()->id;
        $package = DB::table('package')
                ->where('name', '=',  $request->get('package_name'))
                ->where('category_id','=',$request->get('categori_id'))
                ->get()->first();
            
        $booking = new Booking();
        $user = User::find($id);
        
        //$booking->time_from= date("Y-m-d H:i:s", strtotime( $request->get('time_from')));
        // $booking->time_to= date("Y-m-d H:i:s", strtotime( $request->get('time_to')));

        $from=date('Y-m-d H:i:s', strtotime($request->get('time_from')));
        $to=date('Y-m-d H:i:s', strtotime($request->get('time_to')));
      //  dd($booking->getTimeFromAttribute($from));
        // $booking->time_to= Carbon::createFromFormat('Y m d H:i:s', $to);
        $booking->time_from= $booking->getTimeFromAttribute($from);
        $booking->time_to=  $booking->getTimeToAttribute($to);
        $booking->contact_person = $request->get('contact_person');
        $booking->organization= $request->get('organization');
        $booking->status = 1;
        $booking->additional_information = $request->get('additional_information');
        $booking->num_of_participant=$request->get('num_of_participant');
        $booking->num_of_pengiring=$request->get('num_of_pengiring');
        $booking->num_of_participant=$request->get('num_of_participant');
        $booking->amount=$booking->calculateAmount($request->get('package_name'),$request->get('amount'),$booking->num_of_participant,$booking->time_from,$booking->time_to,$booking->num_of_pengiring);
        $booking->setPackageIdAttribute($package->id);
        $booking->setCustomerIdAttribute($id);
        return view("customer.booking.details", compact('booking','package','user'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id=\Auth::user()->id;
        $category= DB::table('categories')
                ->where('name','=',$request->get('category'))
                ->get()->first();

        
            
        $booking = new Booking();
        $user = User::find($id);

        $package = DB::table('package')
                ->where('name', '=',  $request->get('package_name'))
                ->where('category_id','=',$category->id)
                ->get()->first();
        //$booking->time_from= date("Y-m-d H:i:s", strtotime( $request->get('time_from')));
        // $booking->time_to= date("Y-m-d H:i:s", strtotime( $request->get('time_to')));

        $from=date('Y-m-d H:i:s', strtotime($request->get('time_from')));
        $to=date('Y-m-d H:i:s', strtotime($request->get('time_to')));
      //  dd($booking->getTimeFromAttribute($from));
        // $booking->time_to= Carbon::createFromFormat('Y m d H:i:s', $to);
        $booking->time_from= $booking->getTimeFromAttribute($from);
        $booking->time_to=  $booking->getTimeToAttribute($to);
        $booking->contact_person = $request->get('contact_person');
        $booking->organization= $request->get('organization');
        $booking->status = 1;
        $booking->additional_information = $request->get('info');
        $booking->num_of_participant=$request->get('participant');
        $booking->num_of_pengiring=$request->get('pengiring');
        $h=str_replace(',','',$request->get('amount'));
        $harga= doubleval($h);
        $booking->amount=$harga;     
        $booking->setPackageIdAttribute($package->id);
        $booking->setCustomerIdAttribute($id);
        $booking->save();
        return redirect()->route('booking.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
