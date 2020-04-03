@extends('layouts.welcome')

@section('title', __('List Of Bookings'))

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <thead>
             <tr>
                <th>Booking ID</th>
                <th>Email</th>
                <th>Package Name</th>
                <th>Price</th>
                <th>Time Start</th>
                <th>Time End</th>
                <th>Contact Person</th>
                <th>Organization</th>
                 <th>Status</th>
                {{-- <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $packages->currentPage()])</th> --}}
            </tr> 

            {{-- <tr>
                <th>{{ __('views.package.type')}}</th>
               <th>{{__('views.package.name')}}</th>
               <th>{{ __('views.package.active')}}</th>
               <th>{{__('views.package.price')}}(RM)</th>
               <th>{{__('views.package.category')}}</th>
              
               <th>Actions</th>
           </tr>     --}}

            </thead>
            <tbody>
             @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->email}}</td>
                    <td>{{ $booking->packageName}}</td>
                    <td>{{ $booking->price}}</td>
                    <td>{{ $booking->time_from }}</td>
                    <td>{{ $booking->time_to }}</td>
                    <td>{{ $booking->contact_person }}</td>
                    <td>{{ $booking->organization }}</td>

                    @if($booking->status==1)
                    <td>Pending</td>

                    @elseif($booking->status==2)
                    <td>Approved</td>

                    @elseif($booking->status==0)
                    <td>Rejected</td>
                    @endif
                </tr>
            @endforeach 
            </tbody>
        </table>
        <div class="center-block">
            <div class="row">
                <div class="col-xs-12">
                
                </div>
              </div>   
            
        </div>
    </div>
@endsection