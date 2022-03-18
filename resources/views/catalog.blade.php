@extends('layouts.main')

@section('container')
    
<section class="p-5 bg-dark text-white" data-aos="fade-down">
  <div class="container">
    <div class="row text-center mb-5">
      <h1>LIST CATALOG</h1>
    </div>
  </div>
</section>

<section class="p-5">
  <div class="container">
    <div class="row justify-content-center">
      @foreach ($products as $product)
      <div class="col-lg-2 m-3" data-aos="zoom-out"> 
        @if ($product->image == 'product.jpg')
        <img src="https://source.unsplash.com/500x400?merch" alt="img" class="img-fluid">
        @else    
        <img src="/storage/{{ $product->image }}" class="img-fluid mb-3 d-block"" >
        @endif
        <div class="card-body text-center text-black border-top">
          <a href="/product/{{ $product->slug }}" class="text-decoration-none text-black">
            <h5 class="card-title">{{ $product->name }}</h5>
          </a>
          <p class="card-text text-danger fs-5">Rp.{{ $product->price }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection