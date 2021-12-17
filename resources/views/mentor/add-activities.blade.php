@extends('mentor.template')

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/add-activities.css" />
@endsection
    
@section('meta')
    <form action="#" method="post">
      <!--======= HEAD CONTENT ======= -->
      <div class="head-content">
        <p class=""><b>Rabu, 21 Januari 2021</b></p>
        <div class="berhalangan">
          <label>Sedang berhalangan</label>
          <input type="checkbox" />
        </div>
      </div>

      <!--======= CONTENT ======= -->
      <div class="content">
        <!--======= SHALAT WAJIB ======= -->
        <div class="container-amal my-mt-3">
          <label class="my-color"><b>Shalat wajib</b></label>
          <div class="isi">
            <div class="kolom">
              <div class="amalan">
                <span><b>Shalat Subuh</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Dzuhur</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Ashar</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Magrib</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Isya</b></span>
                <input type="checkbox" />
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
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Tahajud</b></span>
                <input type="checkbox" />
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
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Qabliyah Dzuhur</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Ba'diyah Dzuhur</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Qabliyah Ashar</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Qabliyah Magrib</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Ba'diyah Magrib</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Qabliyah Isya</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalat Ba'diyah Isya</b></span>
                <input type="checkbox" />
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
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Baca Al-Quran</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Infaq</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Kajian</b></span>
                <input type="checkbox" />
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
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Dzikir Petang</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Istigfar</b></span>
                <input type="checkbox" />
              </div>
              <div class="amalan">
                <span><b>Shalawat</b></span>
                <input type="checkbox" />
              </div>
            </div>
          </div>
        </div>
        <!--======= AKHIR DZIKIR  =======-->

        <!--======= SIMPAN =======-->
      </div>
      <div class="bot-content">
        <button type="submit" class="simpan my-bg-color">
          <a class="my-tx-color" href="">Simpan</a>
        </button>
      </div>

      <!-- ======= POP UP BERHASIL DISIMPAN ======= -->
      <div class="pop-up">
        <img
          class="done-icon"
          src="img/icon-done.svg"
          alt=""
          style="width: 3rem; margin-right: 0.5rem"
        />
        <b>Data Berhasil Disimpan</b>
      </div>
    </form>
@endsection