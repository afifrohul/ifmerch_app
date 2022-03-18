@extends('dashboard.layouts.main')

@section('container')


<section class="p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 m-3" data-aos = "fade-right">
        @if ($feedback->image == 'testi.jpg')
          <img src="https://source.unsplash.com/400x400?profile" alt="img" class="img-fluid" style="clip-path:circle()">
        @else    
          <img src="/storage/{{ $feedback->image }}" class="img-fluid mb-3 d-block" style="clip-path:circle()" >
        @endif
      </div>
      <div class="col-lg-6 m-3" data-aos="fade-left"> 
        <h3>{{ $feedback->name }}</h3>
        <p>{!! $feedback->desc !!}</p>
        <hr>
        <a href="/dashboard/feedback" class="btn btn-success mb-2" ><span data-feather="arrow-left"></span> Back to all feedback</a>
        <a href="/dashboard/feedback/{{ $feedback->slug }}/edit" class="btn btn-warning mb-2"  ><span data-feather="edit"></span> Edit</a>
        <form action="/dashboard/feedback/{{ $feedback->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
          <button class="btn btn-danger mb-2" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection


