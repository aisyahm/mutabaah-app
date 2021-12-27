@extends('mentor.template')

@section('meta')
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="stylesheet" href="/css/view-activities.css" />
@endsection

@section('content') 
  <div class="content-list">
    <!--======= HEAD CONTENT ======= -->
    <div class="head-content">
      <p><b>Target Amalan Grup</b></p>
      <div class="edit-amalan">
        <a href="{{ route("add-activities",$group->id ) }}">Edit aktivitas grup</a>
      </div>
    </div>

    <!--======= CONTENT ======= -->
    <div class="content">

      <!--======= AMALAN ======= -->
      @foreach ($activities as $key => $value)
      <div class="container-amal ">
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
              <span><b>{{ $activity[0]->name }}</b></span>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
@endsection