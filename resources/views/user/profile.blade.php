@extends('member.template')

@section('meta')
    <link rel="stylesheet" href="/css/profile.css" />
    <link rel="stylesheet" href="/css/my-style.css" />
@endsection

@section('content')
  <div class="content-list">
    <div>
      <a href="{{ url()->previous() }}">
        <i class="fas fa-arrow-left"></i>
        <h3>Kembali</h3>
      </a>
    </div>
    <div class="head-content">
      <b>Profile Anggota</b>
    </div>

    <!-- ======= KONTEN LIHAT PROFILE ======= -->
    <div class="content shadow-sm my-mt-login">
      <img src="/assets/ava/{{ $member->avatar }}.svg" alt="" />
      <div class="data-profile">
        <div class="biodata">
          <div class="data">
            <label class="my-mt-login">Nama Lengkap</label>
            <input class="disable-input" type="text" value="{{ $member->name }}" disabled />
          </div>
          <div class="data">
            <label class="my-mt-login">Email</label>
            <input class="disable-input" type="text" value="{{ $member->email }}" disabled />
          </div>
          <div class="data">
            <label class="my-mt-login">No. HP</label>
            <input class="disable-input" type="text" value="{{ $member->no_telp }}" disabled />
          </div>
        </div>

        <!-- DESKRIPSI -->
        <div class="deskripsi">
          <div class="data">
            <label class="my-mt-login" >Deskripsi</label>
            <textarea
              class="textarea disable-input"
              disabled
            >{{ $member->description }}
            </textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection