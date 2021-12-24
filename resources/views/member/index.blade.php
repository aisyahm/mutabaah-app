@extends("member.template")

@section('content')
  <div class="home-container">
    <img src="./assets/img/no-group.svg" class="no-group" />
    <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
    @if (!Auth::user()->usergroup)
      <h4>
        Saat ini kamu belum memiliki grup. Silahkan gabung grup untuk mulai
        mencatat amalan bersama sahabat sampai surgamu!
      </h4>
      <button class="new-group-btn">Gabung grup baru</button>
    @else
      <h4>
        Ayo berlomba dalam kebaikan bersama teman-teman kamu!
      </h4>
    @endif
  </div>
@endsection