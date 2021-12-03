<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    /* .header {
        background-color: #fff;
        height: 90px;
    } */
    .header-logo{
        width: 200px;
        padding-top: 250px;
        margin: auto;
    }
    .login{
        padding-top: 50px;
        text-align: center;
    }
    .btn-border{
        border: 2px solid #E7E5F4;
        border-radius: 50px;
        padding: 12px 80px 12px 80px;
        text-decoration: none;
        color: rgb(41, 41, 41);
        font-size: 18px;
    }
    .icon{
        margin-right: 10px;
    }
    
</style>
</head> 
<body>
    <div class="header">
        <div class="header-logo">
            <img src="/logo.png" alt="">
        </div>
    </div>

    <div class="login">
        <a class="btn-border" href="{{route('user.login.google')}}">
            <img src="ic_google.svg" class="icon" alt="">
            Continue with Google
        </a>
    </div>

</body>
</html>