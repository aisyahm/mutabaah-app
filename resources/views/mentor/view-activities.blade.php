@extends('mentor.template')

@section('meta')
    <link rel="stylesheet" href="/css/mystyle.css" />
    <link rel="stylesheet" href="/css/view-activities.css" />
@endsection

@section('content') 
    <!--======= HEAD CONTENT ======= -->
    <div class="head-content">
      <p><b>Daftar Amalan</b></p>
      <div class="edit-amalan">
        <a href="">Edit amalan grup</a>
      </div>
    </div>

    <!--======= CONTENT ======= -->
    <div class="content">
      <!--======= SHALAT WAJIB ======= -->
      <div class="container-amal ">
        <label class="my-color"><b>Shalat wajib</b></label>
        <div class="isi">
          <div class="kolom">
            <div class="amalan">
              <span><b>Shalat Subuh</b></span>
            </div>
            <div class="amalan">
              <span><b>Shalat Dzuhur</b></span>
            </div>
            <div class="amalan">
              <span><b>Shalat Ashar</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Magrib</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Isya</b></span>
            </div>
          </div>
        </div>
      </div>
      <!--======= AKHIR SHALAT WAJIB =======-->

      <!--======= SHALAT SUNNAH ======= -->
      <div class="container-amal my-mt-3">
        <label class="my-color"><b>Shalat Sunnah</b></label>
        <div class="isi">
          <div class="kolom">
            <div class="amalan">
              <span><b>Shalat Dhuha</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Tahajud</b></span>
            </div>
          </div>
        </div>
      </div>
      <!--======= AKHIR SHALAT SUNNAH =======-->

      <!--======= SHALAT RAWATIB ======= -->
      <div class="container-amal my-mt-3">
        <label class="my-color"><b>Shalat Rawatib</b></label>
        <div class="isi">
          <div class="kolom">
            <div class="amalan">
              <span><b>Shalat Qabliyah Subuh</b></span>
            </div>
            <div class="amalan">
              <span><b>Shalat Qabliyah Dzuhur</b></span>
            </div>
            <div class="amalan">
              <span><b>Shalat Ba'diyah Dzuhur</b></span>
            </div>
            <div class="amalan">
              <span><b>Shalat Qabliyah Ashar</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Qabliyah Magrib</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Ba'diyah Magrib</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Qabliyah Isya</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalat Ba'diyah Isya</b></span>
            </div>
          </div>
        </div>
      </div>
      <!--======= AKHIR SHALAT RAWATIB =======-->

      <!--======= AMALAN SUNNAH ======= -->
      <div class="container-amal my-mt-3">
        <label class="my-color"><b>Amalan Sunnah</b></label>
        <div class="isi">
          <div class="kolom">
            <div class="amalan">
              <span><b>Puasa Sunnah</b></span>
            </div>
            <div class="amalan">
              <span><b>Baca Al-Quran</b></span>
            </div>
            <div class="amalan">
              <span><b>Infaq</b></span>
            </div>
            <div class="amalan">
              <span><b>Kajian</b></span>
            </div>
          </div>
        </div>
      </div>
      <!--======= AKHIR AMALAN SUNNAH =======-->

      <!--======= DZIKIR ======= -->
      <div class="container-amal my-mt-3">
        <label class="my-color"><b>Dzikir</b></label>
        <div class="isi">
          <div class="kolom">
            <div class="amalan">
              <span><b>Dzikir Pagi</b></span>
            </div>
            <div class="amalan">
              <span><b>Dzikir Petang</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Istigfar</b></span>
            </div>
            <div class="amalan   ">
              <span><b>Shalawat</b></span>
            </div>
          </div>
        </div>
      </div>
      <!--======= AKHIR DZIKIR  =======-->
    </div>
@endsection