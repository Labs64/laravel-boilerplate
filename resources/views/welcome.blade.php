@extends('layouts.welcome')
@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection

@section('content')
{{-- <div class="logo_container jumbotron">
    <span class="logo_helper"></span>
    <a href="http://urf-booking-system.test:8080/">
      <img class="center" style="display: block;margin-left: auto;margin-right: auto; width:50%; height:10%;" src="https://www.utm.my/edutourism/files/2018/11/edu-logo.png" alt="UTM Campus Edutourism Official Webpage" id="logo"  />
    </a>
  </div> --}}
  
  
  <div class="jumbotron">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"style=" width:100%; height:10cm;">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="http://gmm-student.fc.utm.my/~nsbtmr/img/atv.jpg" alt="ATV Riding" style="width:100%; height:10cm;">
        </div>
  
        <div class="item">
          <img src="http://gmm-student.fc.utm.my/~nsbtmr/img/jungletrek.jpg" alt="Kayak" style="width:100%; height:10cm;">
        </div>
      
        <div class="item">
          <img src="http://gmm-student.fc.utm.my/~nsbtmr/img/kayak.jpg" alt="Jungle Trekking" style="width:100%; height:10cm;">
        </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="jumbotron">
        <h4><b>Latar Belakang Hutan Rekreasi</b></h4>
        <p>Hutan Rekreasi, Universiti Teknologi Malaysia (UTM) telah dirasmikan pembukaannya oleh Yang Berbahagia Tan Sri Prof. Ir. Dr. Mohd Zulkifli Tan Sri Mohd Ghazali, Mantan Naib Canselor Universiti Teknologi Malaysia pada 22 Disember 2003.</p>
        <p>Hutan Rekreasi UTM terletak di kawasan Hutan Simpan Kampus UTM, Johor Bahru, Johor yang berkeluasan 37.5 km persegi merupakan salah satu tempat rekreasi dalam kampus. Selain topografinya yang berbukit-bakau, hutan ini turut mempunyai lembah dan beberapa mata air untuk pengairan sungai.</p>
        <p>Hutan ini juga mempunyai keunikan tersendiri kerana menjadi habitat pelbagai spesies flora dan fauna yang ada diantaranya telah berusia 20 tahun.</p>
        <p>Hutan Rekreasi diwujudkan bertujuan untuk menampung keperluan aktiviti beriadah, rekreasi, perkhemahan dan kokurikulum mahasiswa / staf UTM khasnya dan masyarakat sekitar Johor Bahru amnya.</p>
    </div>


    
@endsection

