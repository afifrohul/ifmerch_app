@extends('layouts.main')

@section('container')
    
<section class="p-5 bg-dark text-white" data-aos="fade-down">
  <div class="container">
    <div class="row text-center mb-5">
      <h1>{{ $product->name }}</h1>
    </div>
  </div>
</section>

<section class="p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 m-3" data-aos = "fade-right"> 
        @if ($product->image == 'product.jpg')
          <img src="https://source.unsplash.com/500x400?merch" alt="img" class="img-fluid">
        @else    
          <img src="/storage/{{ $product->image }}" class="img-fluid mb-3 d-block"" >
        @endif
      </div>
      <div class="col-lg-6 m-3" data-aos="fade-left"> 
        <h3>{{ $product->name }}</h3>
        <p>Price : Rp.{{ $product->price }}</p>
        <p>Description : {!! $product->desc !!}</p>
        <hr>
        <a href="" class="text-decortion-none btn btn-outline-success m-3">Order from Whatsapp <i class="bi bi-whatsapp"></i></a>
        <a href="" class="text-decortion-none btn btn-outline-warning m-3">Order from Shopee <i class="bi bi-bag"></i></a>
        <a href="" class="text-decortion-none btn btn-outline-secondary m-3">Order from Tiktok <i class="bi bi-tiktok"></i> </a>
      </div>
    </div>
  </div>
</section>

@endsection