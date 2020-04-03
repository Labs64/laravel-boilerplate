@extends('layouts.welcome')

<style>

 button:focus {
    outline:none; 
  }

</style>

@section('content')
<form class="jumbotron col-sm-4"  style="background-color:dimgray" id="checkPackage">
   
    <fieldset>
      <legend style="color:white">Recreational Packages</legend>
      <br>  
    <div class="form-group">
      <label style="color:white" for="package_type">Package</label>
         <select class="form-control"  id="package_type" required >
            <option value="">Select Package</option>
          @foreach ($packages as $package)
          @if($package->type=="H")
          <option value="{{$package->name}}">H : {{$package->name}}</option>
          @else
         <option value="{{$package->name}}">{{$package->type.' : '.$package->name}}</option>
          @endif    
          @endforeach
        </select>
        <button id="details" data-toggle="modal" data-target="#myModal" type="button"  class="pull-right" style="display:none;background-color: transparent; border :0px;color:yellow">Package Details <span class="glyphicon glyphicon-list" ></span></button>
        <div class="modal fade" id="myModal"  role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Package Description</h4>
          </div>
          <div class="modal-body">
            <ul id="listdetails" style='text-align:justify; display: inline-block;'></ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>
  
    
      <!-- Modal content-->
        
        <label style="display:none; color:yellow;" id="package_error" ></label>
        
    </div>
    <div class="form-group">
      <label style="color:white" for="category_id">Category</label>
         <select class="form-control"  id="cat_id" required>
          <option value="">Select Category</option>
          <option value="1">Student With IC</option>
          <option value="2">Adult With IC</option>
          <option value="3">Student Without IC</option>
          <option value="4">Adult Without IC</option>
          <option value="5">General</option>    
      </select>  
      <label  style="display:none; color:yellow;"  id="category_error" ></label>
    </div>
    <div class="form-group">
      <label style="color:white" for="time_from">From</label>
        <input type="date" class="date form-control" name="from" id="from"  required>
        <label  style="display:none; color:yellow;"  id="from_error" ></label>
    </div>
    <div class="form-group">
     <label style="color:white" for="time_to">To</label>
        <input type="date" class="date form-control" name="to"  id="to" required>
        <label  style="display:none; color:yellow;"  id="to_error" ></label>
    </div>
      <div class="form-group">
      <label style="color:yellow;"id="eligibility_error"></label>
    </div>
    <div class="form-group col-sm-auto">
        <button type="reset" class="btn btn-default col-sm-auto">Cancel</button>
        <button type="button" id="check" class="btn btn-primary col-sm-auto">Check Availability</button>
    </div>
  </fieldset>
</form>
<form class="jumbotron col-sm-8" id="addbooking" style="display:none" method="post"  action="{{ route('booking.submit') }}">
 @csrf
  <fieldset> 
    <div class="form-group col-sm-8">
      <label for="package_name">Package</label>
          <input type="text" class="form-control" id="package_name" name="package_name" readonly>
    </div>
     <div class="form-group col-sm-4">
      <label for="category_id">Category</label>
         <input type="text" class="form-control" id="category_id" readonly>
         <input type="number" class="form-control" id="categori_id" name="categori_id" style="display:none">
    </div>
    <div class="form-group col-sm-4">
      <label  for="time_from">From</label>
        <input type="date" class="date form-control" id="time_from" name="time_from" readonly>
    </div>
    <div  class="form-group col-sm-4">
     <label  for="time_to">To</label>
        <input type="date" class="date form-control" id="time_to"  name="time_to" readonly>
    </div>

    <div  class="form-group col-sm-4">
     <label  for="amount">Amount</label>
        <input id ="amount"  step="0.01" type="number" class="form-control" name="amount" readonly>
    </div>

    <div class="form-group col-sm-6">
      <label for="contact_person">Contact Person</label>
         <input type="text" class="form-control" id="contact_person"  name="contact_person" placeholder="Contact Numer" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="organization">Organization</label>
         <input type="text" class="form-control" id="organization" name="organization" placeholder="School/Organization" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="num_of_participant">Number of Participant</label>
         <input type="number" class="form-control" id="num_of_participant" name="num_of_participant" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="num_of_pengiring">Number of Teachers</label>
         <input type="number" class="form-control" id="num_of_pengiring"  name="num_of_pengiring"  required>
    </div>
    <div class="form-group col-sm-12">
      <label for="num_of_pengiring">Additional Information</label>
         <textarea rows="4"  type="text" class="form-control" id="additional_information" name="additional_information"></textarea>
    </div>

    <div class="form-group col-sm-12">
        <br>Payment need to be made offline
        <br>Please Upload Payment Receipt a day before booking date or booking will be cancelled
        <br>Please accept the terms and condition before continue
        <br>
        <br>
      <label for="payment"></label>

        <input id="active" type="checkbox" required>&nbsp;&nbsp;&nbsp;&nbsp;Accept the term and Condition
    </div>


    <div class="form-group col-sm-6">
        <button type="reset" class="btn btn-default col-sm-auto">Cancel</button>
        <button type="submit" class="btn btn-primary col-sm-auto">Next</button>
    </div>
  </fieldset>

</form>

@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script type="text/javascript">
$("#package_type").change(function()
{
  $("#details").show();
   var id = $("#package_type").children('option:selected').val();
    var price;   
     $.ajax({
          type:'get',
          url:'/api/test/'+id,
          success: function(data) {
           
             var description =data[0].description.split('.');
              for(var i=0;i<description.length;i++)
              {

                $("#listdetails").append("<li>"+description[i]+"</li>");
              }
              
          },
         error: function(data) {
              console.log("tak berjaya");  
          },

     }); 
});
$("#from").change(function(){
  var threeDaysFromNow = new Date();
  threeDaysFromNow.setDate(threeDaysFromNow.getDate() + 3);
  var from = new Date($("#from").val());
  var to = new Date($("#from").val());
  if(from<threeDaysFromNow)
  {
   $("#from_error").html("Booking needs to be made 3 days earlier");
    $("#from_error").show(); 
    $("#from").focusin();
  } 
  else
  {
    $("#from_error").html("");
    $("#from_error").hide();
  } 
});

$("#to").change(function(){
  var to = new Date($("#to").val());
   var from = new Date($("#from").val());
 // var to = new Date($("#from").val());
  if(to<=from)
  {
   $("#to_error").html("End Date should be greater than start date");
    $("#to_error").show();
    $("#to").focusin();
  } 
  else
  $("#to_error").hide();

});

$("#cat_id").change(function(){

   var id = $("#package_type").children('option:selected').val();
    var cat_id = $("#cat_id").children('option:selected').val();
    var price;   
     $.ajax({
          type:'get',
          url:'/api/test/'+id+'/'+cat_id,
          success: function(data) {
          price = data.price.toFixed(2);
           $("#amount").val(price);
          },
         error: function(data) {
              console.log("tak berjaya");  
          },

     });  

});

$( "#check" ).click(function() {
    var time_from = $("#from").val();
    var time_to = $("#to").val();
    

    var id = $("#package_type").children('option:selected').val();
    var cat_id = $("#cat_id").children('option:selected').val();
    var price;   
    
    
      if(checkEligibility(time_from,time_to,id)==true)
      {
      
        $("#eligibility_error").html("");
        $("#eligibility_error").hide("");
        $.ajax({
       
        
          type:'get',
          url:'/api/test/'+time_from+'/'+time_to+'/'+id+'/'+cat_id,
          success: function(data) {
           
            if(data.length!=0)
            alert("Please Select Other Date");
            else
            {
                $("#time_from").val(time_from);
                $("#time_to").val(time_to);
                $("#package_name").val(id);
                
                if( $("#cat_id").children('option:selected').val()==1)
                {
                  $("#category_id").val("Student With IC");
                  $("#categori_id").val(1);
                } 
                else if( $("#cat_id").children('option:selected').val()==2)
                {
                    $("#category_id").val("Adult With IC");
                    $("#categori_id").val(2);
                }  
                else if( $("#cat_id").children('option:selected').val()==3)
                {
                  $("#category_id").val("Student Without IC");
                  $("#categori_id").val(3);
                }
                else if( $("#cat_id").children('option:selected').val()==4)
                {
                  $("#category_id").val("Adult Without IC") ;
                  $("#categori_id").val(4);
                }   
                else if( $("#cat_id").children('option:selected').val()==5)
                {
                  $("#category_id").val("General");
                  $("#categori_id").val(5);
                } 
              
              $("#addbooking").show();
            }
             
            
          },
          error: function(data) {
              console.log("tak berjaya");  
          }
        });
      }
      else
      {
        $("#eligibility_error").html("The package is not eligible for the selected date, please check date differences");
      }
    
   
       
});

function checkEligibility(from,to,name){
  var date1 = new Date(from); 
  var date2 = new Date(to);
  var Difference_In_Time = date2.getTime() - date1.getTime(); 
  
  // To calculate the no. of days between two dates 
  var days = Math.round(Difference_In_Time / (1000 * 3600 * 24)); 
  console.log(days);
  if(name=="PERKHEMAHAN & MOTIVASI (3 HARI 2 MALAM) [PAKEJ PENUH]" && days!=2)
  {
    return false;
  }
  else  if(name=="SEWAAN TAPAK (3 HARI 2 MALAM)" && days!=2)
  {
    return false;
  }
  else  if(name=="PERKHEMAHAN & MOTIVASI (2 HARI 1 MALAM) [PAKEJ PENUH]" && days!=1)
  {
    return false;
  }
  else  if(name=="SEWAAN TAPAK (3 HARI 2 MALAM)" && days!=1)
  {
    return false;
  }
  else 
  return true;
}
</script>  
@endsection