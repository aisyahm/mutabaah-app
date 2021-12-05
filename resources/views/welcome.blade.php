<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

            .navbar-1-6.navbar-light .navbar-nav .nav-link {
                color: #124442;
            }

            .navbar-1-6.navbar-light .navbar-nav .nav-link.active {
                font-weight: 500;
                color: #00A7A0;
            }

            .navbar-1-6 .btn-get-started {
                border-radius: 20px;
                padding: 12px 30px;
                font-weight: 500;
            }

            .navbar-1-6 .btn-get-started-blue {
                background-color: #00A7A0;
                transition: 0.3s;
            }

            .navbar-1-6 .btn-get-started-blue:hover {
                background-color: #00A7A0;
                transition: 0.3s;
            }

            .sign{
                color: white;
                text-decoration: none
            }
            .navbar-brand{
                width: 50px;
            }
        </style>
    </head>
    <body>
        <section class="h-100 w-100 bg-white" style="box-sizing: border-box">
            <nav class="navbar-1-6 navbar navbar-expand-lg navbar-light p-4 px-md-4 mb-3 bg-body border-bottom"
            style="font-family: Poppins, sans-serif">
            <div class="container">
                <img src="navbar-brand.png" alt="" class="navbar-brand">

              {{-- Hamburger Button --}}
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              {{-- Menu Navbar --}}
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link px-md-4 active" aria-current="page" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">Contacts</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">Teams</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link px-md-4" href="#">Review</a>
                  </li>
                </ul>

                {{-- Sign In/Sign Up --}}
                <div class="d-flex btn btn-get-started btn-get-started-blue text-white" >
                    @if (Route::has('login'))                    
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="sign">Sign In / Sign Up</a>
                        @endauth
                    @endif
                </div>

              </div>
            </div>
          </nav>
        </section> 

        Hi, {{ Auth::user()->name }}!

        {{-- @dd(Auth::user()) --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
</html>
