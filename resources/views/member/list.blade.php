@extends('member.template')

@section('content')
    <div class="head-content">
      <p class=""><b>Daftar Anggota ({{ count($membersIn) }} Orang)</b></p>
    </div>

    <div class="content">
      <div class="isi">
        <div class="kolom">

          @foreach ($membersIn as $member)
            <div class="anggota">
              <div class="profile">
                <img src="/assets/ava/{{ $member->avatar }}.svg" />
                <div class="data-profile">
                  <span class="nama"><b>{{ $member->name }}</b></span>
                  <span class="hp">{{ $member->no_telp }}</span>
                </div>
              </div>
              
              <a href="/profile/{{ $member->id }}"><button
                class="lihat-profile btn btn-outline-success my-color"
                style="border-color: #01a6a0"
              >Lihat Profil</button></a>
              
            </div>
          @endforeach

        </div>
      </div>
    </div>
@endsection

@section('meta')
    <!-- MY CSS -->
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/list-member.css" />
@endsection


