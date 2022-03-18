@extends('dashboard.layouts.main')

@section('container')


<section class="p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 m-3" data-aos = "fade-right">
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
        <a href="/dashboard/product" class="btn btn-success mb-2" ><span data-feather="arrow-left"></span> Back to all product</a>
        <a href="/dashboard/product/{{ $product->slug }}/edit" class="btn btn-warning mb-2"  ><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/product/{{ $product->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
          <button class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection


