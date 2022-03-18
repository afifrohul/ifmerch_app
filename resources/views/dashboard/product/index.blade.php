@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
  </div>

  @if (session()->has('success')) 
  <div class="alert alert-success" role="alert col-lg-8">
    {{ session('success') }}
  </div>  
  @endif 
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/product/create" class="btn btn-primary mb-3">Create New Product</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }}</td>
          <td>
            <a href="/dashboard/product/{{ $product->slug }}" class="badge bg-info mb-1"><span data-feather="eye"></span></a>
            <a href="/dashboard/product/{{ $product->slug }}/edit" class="badge bg-warning mb-1"><span data-feather="edit"></span></a>
            <form action="/dashboard/product/{{ $product->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger mb-1 border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection

