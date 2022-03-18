@extends('dashboard.layouts.main')

@section('container')

{{-- @php
    dd($feedback)
@endphp --}}

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Feedback</h1>
  </div>

  @if (session()->has('success')) 
  <div class="alert alert-success" role="alert col-lg-8">
    {{ session('success') }}
  </div>  
  @endif 
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/feedback/create" class="btn btn-primary mb-3">Create New Feedback</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Feedback</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($feedback as $testi)    
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $testi->name }}</td>
          <td>{!! $testi->desc !!}</td>
          <td>
            <a href="/dashboard/feedback/{{ $testi->slug }}" class="badge bg-info mb-1"><span data-feather="eye"></span></a>
            <a href="/dashboard/feedback/{{ $testi->slug }}/edit" class="badge bg-warning mb-1"><span data-feather="edit"></span></a>
            <form action="/dashboard/feedback/{{ $testi->slug }}" method="post" class="d-inline">
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

