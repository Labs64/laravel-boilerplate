@extends('layouts.welcome')

@section('content')

    <div class="jumbotron" style="width:100%;">
        <h1>PACKAGES</h1>
    </div>
    <div class = "JUMBOTRON" >
        {{-- onclick="openPackages('{{$queri->type}}');" --}}
        @php $i=0 @endphp
        @foreach($query as $queri) 
        @php  $i++ @endphp
        <button href="#" id="collapsible"  onclick="openPackages('{{$queri->name}}',{{$i}});"  style= "padding: 10px 10px; font-size:15px; text-align: left;border-radius: 8px; width: 100%;display: inline-block; background-color: #777;color:white;"><strong>PAKEJ {{$queri->type}} :  {{$queri->name}}</strong></button> 
        <div class="content{{$i}}" style ="display:none;padding:2px; background-color:azure;">
       
        
        <h6><b>Maklumat Tambahan</b></h6>
        <ul style="text-align:justify; display: inline-block;">
            @foreach(explode('.', $queri->description) as $info)
                <li>{{ $info }}</li>
            @endforeach
        </ul>
        <h6><b>Harga : RM {{ number_format($queri->price, 2) }}</b></h6> 
        @if($queri->active)
        <h6><b>Status: Tersedia / Available</b></h6>
        @else
        <h6><b>Status: Tidak Tersedia / Not Available</b></h6>
       
        @endif
        


       </div>

       @endforeach 
    </div>
    


@endsection


@section('scripts')
<script>
    
function openPackages(id,i){
  
        $.ajax({
          type:'get',
          url:'/api/test/'+ id,
          success: function(data) {
           var content = $(".content"+i);
                $(content).toggle();
                
            
        },
         error: function(data) {
          }
        });
     // hides matched elements if shown, shows if hidden 
     //$(".content", $(this).next()).toggle(); 
   
}      
//         // hides children divs if shown, shows if hidden 
//          //   $(this).children(".content").show(); 
    

</script>


