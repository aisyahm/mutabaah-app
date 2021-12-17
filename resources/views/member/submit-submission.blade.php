@extends('member.template')

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/submit-submission.css" />
@endsection

@section('content')
  <div class="content-list">
    <form action="/groups/add-activities" method="post">
      <!--======= HEAD CONTENT ======= -->
      <div class="head-content">
        <p class=""><b>{{ $date }}</b></p>
        <div class="berhalangan">
          <label for="haid">Sedang berhalangan</label>
          <input type="checkbox" id="haid" name="haid" />
        </div>
      </div>

      <!--======= CONTENT ======= -->
      <div class="content">
        <!--======= SHALAT WAJIB ======= -->
        @foreach ($activities as $key => $value)
        <div class="container-amal my-mt-3">
          <label class="my-color">
            @switch($key)
                @case(1)
                    <b>Sholat Wajib</b>
                    @break
                @case(2)
                    <b>Sholat Rawatib</b>
                    @break
                @case(3)
                    <b>Sholat Sunnah</b>
                    @break
                @case(4)
                    <b>Amalan Sunnah Lainnya</b>
                    @break
                @default
                    <b>Dzikir</b>
            @endswitch
          </label>

          <div class="isi">
            <div class="kolom">

              @foreach ($value as $activity)
                <div class="amalan">
                  <label for="{{ $activity }}"><b>{{ $activity }}</b></label>
                  <input id="{{ $activity }}" name="{{ $activity }}" type="checkbox" />
                </div>
              @endforeach

            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!--======= SIMPAN =======-->
      <div class="bot-content">
        <button type="submit" class="simpan my-bg-color">
          <a class="my-tx-color" href="">Simpan</a>
        </button>
      </div>

      <!-- ======= POP UP BERHASIL DISIMPAN ======= -->
      <div class="pop-up">
        <img
          class="done-icon"
          src="/assets/img/icon-done.svg"
          alt=""
          style="width: 3rem; margin-right: 0.5rem"
        />
        <b>Data Berhasil Disimpan</b>
      </div>
    </form>
  </div>
@endsection
