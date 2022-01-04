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

    <div class="container">
      <div class="login shadow-sm px-6">
        <div class="error {{ $errors->any() ? "alert" : ""}}">
            @if($errors->any())
            <div>
              {{ $errors->first() }}
            </div>
            @endif
        </div>

        <div class="register {{ session()->has('register') ? "success" : ""}}">
            @if(session()->has('register'))
            <div>
              {{ session('register') }}
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
    </div>

    <!-- SCRIPT -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
