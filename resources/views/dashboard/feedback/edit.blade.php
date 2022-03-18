@extends('dashboard.layouts.main')

@section('container')

{{-- @php
dd($feedback)
@endphp --}}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Feedback</h1>
</div>


<div class="col-lg-8 mb-5">
  <form action="/dashboard/feedback/{{ $feedback->slug }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $feedback->name) }}">
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <input type="hidden" name="oldImage" value="{{ $feedback->image }}">
      @if ($feedback->image == 'testi.jpg')
        <img src="https://source.unsplash.com/400x400?profile" alt="img" class="img-fluid d-block mb-3" style="clip-path:circle()">
      @else    
        <img src="/storage/{{ $feedback->image }}" class="img-fluid mb-3 d-block" style="clip-path:circle()">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="desc" class="form-label">Description</label>
      @error('desc')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="desc" type="hidden" name="desc" required value="{{ old('desc', $feedback->desc )}}">
      <trix-editor input="desc"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Update Feedback</button>
  </form>
</div>

<script>
  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview')

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection