@extends('layouts.user')

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('/images/slide1.jpg') }}" class="d-block " alt="...">
    </div>
    <div class="carousel-item ">
      <img src="{{ asset('/images/slide2.jpg') }}" class="d-block" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="{{ asset('/images/slide3.jpg') }}" class="d-block" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="{{ asset('/images/slide4.jpg') }}" class="d-block" alt="...">
    </div>
  </div>
</div>

@endsection