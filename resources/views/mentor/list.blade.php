@extends('mentor.template')
    
@section('content')
    <!-- ======= KONFIRMASI ANGGOTA ======= -->
    @if (count($membersOut))
      <div class="head-content">
        <p class=""><b>Persetujuan Masuk Grup</b></p>
      </div>

      <div class="konfirmasi">
        <div class="isi">
          <div class="kolom">

            @foreach ($membersOut as $member)
              <div class="anggota">
                <div class="profile">
                  <img src="/assets/ava/{{ $member->avatar }}.svg" />
                  <div class="data-profile">
                    <span class="nama"><b>{{ $member->name }}</b></span>
                    <span class="hp">{{ $member->no_telp }}</span>
                  </div>
                </div>

                <div class="action">
                  <a href="/reject/{{ $group->id }}/{{ $member->id }}">
                    <img class="btn-cyrcle" src="/assets/img/icon-cancel.svg" onclick="return confirm('Reject the request?')" />
                  </a>
                  <a href="/accept/{{ $group->id }}/{{ $member->id }}">
                    <img class="btn-cyrcle" src="/assets/img/icon-done.svg" />
                  </a>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>
      <!--  AKHIR KONFIRMASI ANGGOTA  -->
    @endif

    @if (count($membersIn))
      <div class="content-list">
        <div class="head-content list-member">
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
                  <button class="lihat-profile btn btn-outline-success my-color">
                    <a href="/activity/{{ $member->id }}">Lihat Amalan</a>
                  </button>
                </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    @endif
@endsection

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/list-mentor.css" />
@endsection