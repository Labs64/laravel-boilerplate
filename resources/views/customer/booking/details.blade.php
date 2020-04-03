@extends('layouts.welcome')

<style>
  input {
    background-color:transparent;
    border: 0px solid;
    height:20px;
    width:170px;
    text-align: right;
    padding-right: 1px;
 
    
  }
  input:focus {
    outline:none; 
  }
  #container{
    border: 2px solid darkgrey;
  }
</style>

@section('content')

<legend>Recreational Booking Package Check Out</legend>

<form class="jumbotron col-sm-12" method="post"  action="{{ route('booking.store') }}">
   @csrf
  <legend>Booking Details</legend>
    <div id="container" class="form-group col-sm-6">
        <p class="parent"><b><u>Customer Information</u></b></p>
        <div class="child">
          <label><strong>Full Name  </strong></label>
           <input class="pull-right" type="text" name="username" value="{{$user->name}}" readonly/>
        </div>
        <div class="child">
          <label><strong>Email  </strong></label>
           <input class="pull-right" type="text" name="email" value="{{$user->email}}" readonly/>
        </div> 
         <div class="child"> 
          <label><strong>Phone Number </strong></label>
           <input  class="pull-right" type="text" name="phoneNo" value="{{$user->phoneNo}}" readonly/>
        </div>
    </div>
    <div id="container" class="form-group col-sm-6">
      <p class="parent"><b><u>Package Information</u></b></p>
         <div class="child">
          <label><strong>Package Name</strong></label>
           <input class="pull-right" type="text" name="package_name" value="{{$package->name}}" readonly/>
          </div>
          <div class="child">
            <label><strong>Package Category</strong></label>
                @if($package->category_id == 1)
                  <input class="pull-right" type="text" name="category" value="{{ __('views.admin.pakej_1') }}" readonly/>
                    
                @elseif($package->category_id == 2)
                  <input class="pull-right" type="text" name="category" value="{{ __('views.admin.pakej_2') }}" readonly/>
                    
                @elseif($package->category_id == 3)
                  <input class="pull-right" type="text" name="category" value="{{ __('views.admin.pakej_3') }}" readonly/>
                    
                @elseif($package->category_id == 4)
                  <input class="pull-right" type="text" name="category" value="{{ __('views.admin.pakej_4') }}" readonly/>

                @elseif($package->category_id == 5)
                  <input class="pull-right" type="text" name="category" value="{{ __('views.admin.pakej_general') }}" readonly/>
                @endif 
          </div> 
          <div class="child"> 
            <label><strong>Price per Unit/Day (RM)</strong></label>
            <input  class="pull-right" type="text" name="price" value="{{number_format($package->price,2)}}" readonly/>
          </div>
    </div>
    <div id="container" class="form-group col-sm-12">
        <p><b><u>Booking Information</u></b></p>
        <div class="child">
          <label><strong>Start Date</strong></label>
          <input class="pull-right" type="text" name="time_from" value="{{\Carbon\Carbon::parse($booking->time_from)->format('l, d-m-Y')}}" readonly/>
        </div>
        <div class="child">
          <label><strong>End Date</strong></label>
          <input class="pull-right" type="text" name="time_to" value="{{\Carbon\Carbon::parse($booking->time_to)->format('l, d-m-Y')}}" readonly/>
        </div>
        <div class="child">
          <label><strong>Number Of Participants</strong></label>
          <input class="pull-right" type="text" name="participant" value="{{$booking->num_of_participant}}" readonly/>
        </div>
        <div class="child">
          <label><strong>Number Of Teacher</strong></label>
          <input class="pull-right" type="text" name="pengiring" value="{{$booking->num_of_pengiring}}" readonly/>
        </div>
         <div class="child">
          <label><strong>Contact Number</strong></label>
          <input class="pull-right" type="text" name="contact_person" value="{{$booking->contact_person}}" readonly/>
        </div>
        <div class="child">
          <label><strong>Organization</strong></label>
          <input class="pull-right" type="text" name="organization" value="{{$booking->organization}}" readonly/>
        </div>
        <div class="child">
          <label><strong>Additional Information</strong></label>
        <input class="pull-right" type="text" name="info" value="{{$booking->additonal_information}}" readonly/>
        </div>    
        <div class="child"> 
          <label><strong>Amount (RM)</strong></label>
          <input  class="pull-right" type="text" name="amount" value="{{number_format($booking->amount,2)}}" readonly/>
        </div>
    </div>
    <div id="container" class="form-group col-sm-12">
        <p><b><u>Inquiries</u></b></p>
        <strong>SENIOR MANAGER EN. ZAIDI BIN HJ. MOHMOD :</strong>
        (+607) 553 0167 / (+6012) 717 4861
        <br> <strong>General Office : </strong> (+607) 553 1216<br>
        <br>
    </div>
    <div class="form-group col-sm pull-right">
        <button type="reset" class="btn btn-default" href="{{url('/menu')}}">Back</button>
        <button type="submit" class="btn btn-primary">Check Out</button>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">

$().ready(function(){


});

</script>  
@endsection

