{{-- @extends('main.index')

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
    
@endsection --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/login-style.css" />
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>

  <body>
    <nav class="navbar">
      <img src="/assets/img/logo.png" class="logo" />
    </nav>

    <center style="margin-top: 6rem">
      <div class="login shadow-sm px-6">
        <div class="error {{ $errors->any() ? "alert" : ""}}">
            @if($errors->any())
            <div>
              {{ $errors->first() }}
            </div>
            @endif
        </div>

        <h2>Login</h2>
        <h6>Silahkan isi data akun kamu untuk login</h6>

        <form action="{{ route("login") }}" method="POST">
          @csrf
          <label for="email" class="my-fo-size mt-3">Email</label>
          <input
            name="email"
            type="email"
            placeholder="Masukkan email kamu"
            autofocus value="{{ old("email") }}" 
            autocomplete="off"
            required
          />

          <label for="password" class="my-fo-size my-mt-login password">Password</label>
          <input
            name="password"
            type="password"
            placeholder="Masukkan password kamu"
            autofocus value="{{ old("password") }}" 
            autocomplete="off"
            required
          />

          <div class="remember my-mt-login">
            <div>
              <input type="checkbox" name="remember" >
              <label for="remember">Ingat saya</label>
            </div>

            <div>
              <a href="{{ route("forgot") }}">Lupa password?</a>
            </div>
          </div>

          <button type="submit" class="btn btn-login my-bg-color my-mt-login">Login</button>
        </form>

        <h4 class="my-mt-login my-fo-size">atau</h4>

        <form action="{{ route("google") }}" method="get">
          @csrf
          <button type="submit" class="shadow-sm rounded google">
            <img src="/assets/img/google.png" class="google-img" width="15px" />Sign in with google
          </button>
        </form>

        <div class="regist-link my-fo-size my-mt-login">
          <h3>Belum punya akun?
            <a class="my-color" href="{{ route("register") }}">Register disini</a></h3>
        </div>
      </div>
    </center>
    <!-- SCRIPT -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
