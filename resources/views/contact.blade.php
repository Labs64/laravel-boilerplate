@extends('layouts.welcome')
@section('content')

    <div>
        <div><h2>Get In Touch</h2> </div>
        <table>
            <tr>
                <td><p>Cluster of Sports, Recreational and Edutourism, Business Management Division,<br> 
                    Office of Deputy Vice Chancellor (Development),<br> 
                    81310 UTM Johor Bahru, Johor Darul Takzim.</p>
                </td>
            </tr>
            <tr><p>SENIOR MANAGER EN. ZAIDI BIN HJ. MOHMOD:<br> (+607) 553 0167 / (+6012) 717 4861
                    <br><br>General Office : (+607) 553 1216<br><br> Fax : (+607) 5530582</p>
                </td>
            </tr>
            <tr>
                <td><p>OFFICE HOUR<br>
                    Sunday to Wednesday<br>
                    8.30 am – 1.00 pm<br>
                    2.00 pm – 5.30 pm<br>
                    <br>
                    Thursday<br>
                    8.30 am – 1.00 pm<br>
                    2.00 pm – 5.30 pm<br></p></td>
            </tr>
        </table>
    </div>
    </div>
    <div class="w3-container w3-half w3-dark-grey">
        <div class="w3-container-eclipes w3-grey ">
            <h2>Contact Us</h2></div>
            @if(Session::has('success'))
               <div class="alert alert-success">
                 {{ Session::get('success') }}
               </div>
            @endif
            {!! Form::open(['route'=>'contactus.store']) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {!! Form::label('Name:') !!}
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
            <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {!! Form::label('Email:') !!}
            {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
            <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            {!! Form::label('Message:') !!}
            {!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
            <span class="text-danger">{{ $errors->first('message') }}</span>
            </div>
            <div class="form-group">
            <button class="btn btn-success">Submit</button>
            </div>
            {!! Form::close() !!}
            
       
    </div>
@endsection