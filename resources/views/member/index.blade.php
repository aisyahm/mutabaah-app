@extends("member.template")

@section('content')
  @if (!Auth::user()->usergroup)
  <img src="./assets/img/no-group.svg" class="no-group" />
  <h2>Selamat Datang, {{ Auth::user()->name }}</h2>
  <h4>
    Saat ini kamu belum memiliki grup. Silahkan gabung grup untuk mulai
    mencatat amalan bersama sahabat sampai surgamu!
  </h4>
  <button class="new-group-btn">Gabung grup baru</button>
  @else
  <h3>Kamu Belum Punya Aktivitas. Hubungi mentor di grub ini untuk membuat target aktivitas.</h3>
  @endif
@endsection