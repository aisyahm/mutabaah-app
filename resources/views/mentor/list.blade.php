@php
  use App\Models\GroupActivity;  
  use Carbon\Carbon;

  $today = Carbon::now()->isoFormat('D MMMM Y');
  $i = 1;
@endphp

@extends('mentor.template')

@include('mentor.top')

@section('content')
<!-- ======= KONFIRMASI ANGGOTA ======= -->
@include('mentor.analysis-group')

    {{-- @include('mentor.view-activities') --}}
    {{-- @if (count($membersOut))
    <div class="content-list">
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
    </div>
      <!--  AKHIR KONFIRMASI ANGGOTA  -->
    @endif --}}


    {{-- @if (count($membersIn))
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
                  
                  <a href="/groups/chart/{{ $member->id }}/{{ $group->id }}">
                    <button class="lihat-profile btn btn-outline-success my-color">Lihat Amalan</button>
                  </a>
                  
                </div>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    @else
      <div class="content-list">
        <h3>Belum ada anggota di grub ini.</h3>
      </div>
    @endif --}}

    {{-- <div class="content-list">
      @if (count(GroupActivity::where("group_id", $group->id)->get()))
        <a href={{ route("group-activities", $group->id) }}>Lihat Target Aktivitas</a>
      @else
        <a href="./add-activities/{{ $group->id }}">Tambah Aktivitas</a>
      @endif
    </div> --}}
{{-- 
    <div class="content-list">
      @if (count(GroupActivity::where("group_id", $group->id)->get()))
        <a href="/groups/chart/{{ $group->id }}">Lihat Statistik Amalan Harian</a>
      @endif
    </div> --}}

    {{-- <div class="content-list">
      <div class="danger-container">
        <form action="{{ route("delete") }}" method="post">
          @csrf
          <input type="hidden" name="group_id" value="{{ $group->id }}">
          <button type="submit" id="danger-btn" name="delete" value="1" onclick="return confirm('Yakin ingin menghapus grup ini?')">Hapus grup ini</button>
        </form>
      </div>
    </div> --}}
@endsection

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/list-mentor.css" />
@endsection