@extends('layouts.user')

@section('content')
<body class="sub_page"> 
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <form action="{{ route('public.collection')  }}" method="POST">
            @csrf
            <div class="row">
               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="img-box">
                        <img src="{{ asset('/images/stickers/' .$sticker->image)}}" alt="">
                     </div>
                     <div class="detail-box">
                     @foreach($collections as $collection)
                        <h5>
                           {{$collection->name}}
                        </h5>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
@endsection