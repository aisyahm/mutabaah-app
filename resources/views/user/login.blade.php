@extends('main.index')

@section('container')

  <div class="row justify-content-center">
    <div class="col-lg-6">
      <main class="form-signin">

        @if($errors->any())
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
              {{ $errors->first() }}
            </div>
          </div>
        @endif

        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
        <form action="{{ route("login") }}" method="POST">
          @csrf
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old("username") }}" required >
            <label for="username">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
      
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <br>
        <h6>Or login by <a href={{ route("google") }}>Google</a></h6>
      </main>
    </div>
  </div>
    
@endsection