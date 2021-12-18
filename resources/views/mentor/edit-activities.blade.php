@extends('member.template')

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/submit-submission.css" />
@endsection

@section('content')
  <div class="content-list">
    <form action="/groups/add-activities" method="POST">
      @csrf
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
                  <label for="{{ $activity[0] }}"><b>{{ $activity[0] }}</b></label>
                  <input id="{{ $activity[0] }}" name="group_activity[]" value="{{ $activity[1] }}" type="checkbox"    {{ in_array($activity[1], $group_activities_id) ? "checked" : "" }} />
                </div>
              @endforeach

            </div>
          </div>
        </div>
        @endforeach
      </div>

      <input name="group_id" value="{{ $group->id }}" type="hidden">

      <!--======= SIMPAN =======-->
      <div class="bot-content">
        <button type="submit" class="simpan my-bg-color">
          Simpan Target Aktivitas
        </button>
      </div>
    </form>

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
  </div>
@endsection
