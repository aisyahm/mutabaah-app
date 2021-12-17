<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mentor Analisis</title>
  {{-- css --}}
  <link rel="stylesheet" href="css/mentor/style.css" >
  {{-- FA 6 --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  {{-- @extends('nav');
  @section('nav')
  @endsection --}}
  <header>
    <nav>
      <div class="logo-app">
        <div class="img">
         <img src="" alt="">Logo <span>Mentor</span>
        </div>
         <div class="atas">
            <li><a href="#">Buat Grup Baru  <i class="fas fa-plus-square"></i></a></li>
            <li><a href="#">Daftar Grup</a></li>
        </div>
      </div>
        <ul>
          <li><a href="#"><i class="far fa-user logos"></i> Akun Saya</a></li>
          <li><a href="#"><i class="fas fa-sign-out-alt logos"></i> Logout</a></li>
        </ul>
    </nav>
    <div class="content">
      <section>
        <div class="info1 info-all">
          <img src="" alt="">
          <div class="text1">
            <h1>Nama Grup</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, accusantium.</p>
            <div class="input-code">
              <button>
              <input type="text" name="" id="" value="Kode Grup: xxxxxx">
                Salin
              </button>
            </div>
          </div>
          <div class="icon">
            <i class="fas fa-ellipsis-v"></i>
          </div>
        </div>
        <div class="info2 info-all">
          <div class="text1 text-all">Analisis</div>
          <div class="text2 text-all">Anggota(6)</div>
          <div class="text3 text-all">Target</div>
        </div>
        <div class="info3 info-all">
          <h1>Statistik Amalan Harian <span>21 Nov 2021</span></h1>
          <a href="/mentoranalisis/exportsubmission"><button>Download laporan</button> </a>
        </div>
        <div class="info4">
          <div class="bar-chart1"></div>
          <div class="bar-chart2"></div>
          <div class="bar-chart3"></div>
        </div>
      </section>
    </div>
  </header>
</body>
</html>