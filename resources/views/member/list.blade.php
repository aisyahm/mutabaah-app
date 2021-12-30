@php
  use App\Models\GroupActivity; 
  use Illuminate\Support\Facades\Auth;

  
@endphp

@extends('member.template')

@section('meta')  
  <link rel="stylesheet" href="/css/my-style.css" />
  <link rel="stylesheet" href="/css/list-member.css" />
@endsection

@include('member.top')

@section('content')
  <div class="content-list">
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
              
              <a href="profile/{{ $member->id }}/{{ $group->id }}"><button
                class="lihat-profile btn btn-outline-success my-color"
                style="border-color: #01a6a0"
              >Lihat Profil</button></a>
              
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>

  <div class="content-list">
    @if (count(GroupActivity::where("group_id", $group->id)->get()))
      <a href="./activities/{{ $group->id }}">Submit Target Aktivitas</a>
    @else
      <h4>Belum ada target aktivitas di grup ini, silahkan hubungi mentor grup untuk membuat target aktivitas grup</h4>
    @endif
  </div>

  <div class="content-list">
    <a href="{{ route("chart-member", ["userId" => Auth::user()->id, "groupId" => $group->id]) }}">Analisis Amalan</a>
  </div>

  {{-- <div class="content-list">
    <div class="danger-container">
      <form action="{{ route("delete") }}" method="post">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <button type="submit" id="danger-btn" name="leave" value="1" onclick="return confirm('Yakin ingin keluar grup?')">Keluar grup ini</button>
      </form>
    </div>
  </div> --}}
@endsection


