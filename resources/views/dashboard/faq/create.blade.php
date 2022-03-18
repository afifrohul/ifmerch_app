@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New FAQ</h1>
</div>


<div class="col-lg-8 mb-5">
  <form action="/dashboard/faq" method="post">
    @csrf
    <div class="mb-3">
      <label for="question" class="form-label">Question</label>
      @error('question')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="question" type="hidden" name="question" required value="{{ old('question')}}">
      <trix-editor input="question"></trix-editor>
    </div>
    <div class="mb-3">
      <label for="answer" class="form-label">Answer</label>
      @error('answer')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="answer" type="hidden" name="answer" required value="{{ old('answer')}}">
      <trix-editor input="answer"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Create FAQ</button>
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