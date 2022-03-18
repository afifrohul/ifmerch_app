@extends('layouts.main')

@section('container')
<div class="row justify-content-center my-3">
  <div class="col-lg-6 col-md-8">
    @if (session()->has('succes'))
        
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('succes') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin">
      <h1 class="h3 mb-5 fw-normal text-center">Please Login</h1>
      <form action="/back-log" method="post">
        @csrf
        <div class="form-floating">
          <input type="name" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
    </main>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection