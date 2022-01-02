@extends('member.template')

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/submit-submission.css" />
@endsection

@include('member.top')


@section('content')
  <div class="content-list">
    <form action="{{ route("new-submission") }}" method="post">
      @csrf
      <!--======= HEAD CONTENT ======= -->
      <div class="head-content">
        <p class=""><b>{{ $date }}</b></p>

        @if (Auth::user()->gender == "Ukhti")
          <div class="berhalangan">
            <label for="haid">Sedang berhalangan</label>
            <input type="checkbox" id="haid" name="haid" value="1" {{ $haid == true ? "checked" : "" }} />
          </div>
        @endif
      </div>

      {{-- INFO KETIKA CHECKLIST HAID --}}
      <div class="info">
        <img src="/assets/img/alert-warning.svg">
        <h4>Karena kamu sedang berhalangan, beberapa amalan tidak bisa kamu isi dulu, ya!</h4>
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
                  <label for="{{ $activity[0]->id }}"><b>{{ $activity[0]->name }}</b></label>
                  <input id="{{ $activity[0]->id }}" name="group_activity[]" type="checkbox" value="{{ $activity[0]->id }}" {{ in_array($activity[1], $doneBefore) ? "checked" : "" }} />
                  
                </div>
              @endforeach

            </div>
          </div>
        </div>
        @endforeach
      </div>

      <input type="hidden" name="group_id" value="{{ $group->id }}">

      <!--======= SIMPAN =======-->
      <div class="bot-content submission">
        <button type="submit" class="simpan my-bg-color">Simpan</button>
      </div>

    </form>

    <!-- ======= POP UP BERHASIL DISIMPAN ======= -->
    <div class="pop-up">
      <img
        class="done-icon"
        src="/assets/img/icon-done.svg"
        style="width: 3rem; margin-right: 0.5rem"
      />
      <b>Data Berhasil Disimpan</b>
    </div>
  </div>


  <script>
    const haid = document.getElementById("haid");
    const group_activity = document.querySelectorAll('.content input');
    const info = document.querySelector('.content-list .info');
    const is_haid = {!! json_encode($haid) !!}

    const haidTrue = () => {
      group_activity.forEach(activity => {
        if (activity.getAttribute("id") < 19) {
          activity.checked = false;
          activity.setAttribute("disabled", "");
          activity.parentNode.setAttribute("style", "color: grey");
        }
      });
      info.classList.add("haid");
    }

    const haidFalse = () => {
      group_activity.forEach(activity => {
        if (activity.getAttribute("id") < 19) {
          activity.removeAttribute("disabled");
          activity.parentNode.removeAttribute("style");
        }
      });
      info.classList.remove("haid");
    }

    if (is_haid) {
      haid.checked = true;
      haidTrue();
    }
    if (haid) {
      haid.addEventListener("change", (event) => {
        if (event.target.checked) {
          haidTrue();
        } else {
          haidFalse();
        }
      });
    }
  </script>
@endsection
