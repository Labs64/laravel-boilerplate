@extends('layouts.welcome')

@section('content')

    <div >
        <h1>Packages</h1>
    </div>
    <div>
        @foreach($query as $queri) 
        @if($queri->type=='H')
            <button type="button" class="collapsible" onclick="openPackages('{{$queri->type}}')">PAKEJ {{$queri->type}} :   AKTIVITI REKREASI</button>        
            <br>
        @else
       <button type="button" class="collapsible" onclick="openPackages('{{$queri->type}}')">PAKEJ {{$queri->type}} :   {{$queri->name}}</button>
       <br>
       @endif
       <div  style ="text-align: justify;">
        <h6><b>{{$queri->name}}</b></h6>
        <h6><b>Maklumat Tambahan</b></h6>
        <ul>
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
@push('scripts')
<script>

function openPackages(id) {
    $.ajax({
        type:'get',
        url:'/api/test/'+ id,
        success: function(data) {
            console.log('berjaya');
            collapse();
            console.log(data);
        },
        error: function(data) {

        }
    })
}
function collapse(){
var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");  
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } 
            else {
                content.style.display = "block";
            }   
            }
        );
}
}

</script>

@endpush
