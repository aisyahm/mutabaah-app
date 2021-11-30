<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Index</title>
  <style>
    body {
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      max-width: 600px;
      height: 100vh;
    }
  </style>
</head>
<body>
  @if (Auth::user())
    <h2>Halo, {{ Auth::user()->name }}{{ Auth::user()->is_mentor ? " (Mentor)" : "" }}!</h2>  
    <br>
  @endif
  
  <div class="container mt-2">
    @yield('container')
  </div>
</body>
</html>