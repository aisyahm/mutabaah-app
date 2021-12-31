@extends(Auth::user()->is_mentor ? "mentor.template" : "member.template")

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
  <link rel="stylesheet" href="/css/detail-activity.css" />
@endsection

@section('content')
  @if (Auth::user()->is_mentor)
    <div class="back">
      <a href="/groups/{{ $group->id }}">
        <i class="fas fa-arrow-left"></i>
        <h3>Kembali Ke Grup</h3>
      </a>
    </div>
    <div class="profile-container">
      <div class="profile">
        <div class="profile-img">
          <img src="/assets/ava/{{ $user->avatar }}.svg">
        </div>
        <div class="profile-detail">
          <h3>{{ $user->name }}</h3>
          <h4>{{ $user->no_telp }}</h4>
        </div>
      </div>
      <a href="/groups/profile/{{ $user->id }}/{{ $group->id }}">Lihat Detail Akun</a>
    </div>
  @endif

  <div class="excel-content">
    <h2>Statistik Amalan Pribadi</h2>
    <a href={{ route("report-member", ["user" => $user->id, "group" => $group->id]) }}>Download Laporan</a>
  </div>
  <div class="chart-container">
    <div class="chart-title">
      <h3>Amalan Sepekan</h3>
      <h4>{{ $dates[0] . ' - ' . $dates[1] }} vs  <span>{{ $dates[2] . ' - ' . $dates[3] }}</span></h4>
    </div>
    <div class="inner">
      <div class="chart">
        <canvas id="myChart"></canvas>
      </div>
    </div>
    <div class="legend">
      <span><span></span>Pekan lalu</span>
      <span><span></span>Pekan Ini</span>
    </div>
  </div>

  <div class="detail-activity-container">
    <div class="title-detail-amalan">
        <h3>Detail Amalan</h3>
        <p>{{ $dates[2] }} - {{ $dates[3] }}</p>
    </div>
    <div class="ket-container">
        <p>Keterangan</p>
        <div class="keterangan-info-container">
          <div class="keterangan-info"><span></span>Mengerjakan</div>
          <div class="keterangan-info"><span></span>Tidak Mengerjakan</div>
          <div class="keterangan-info"><span></span>Belum Mengisi</div>
        </div>
    </div>

    <div class="parent">
      @foreach ($activityDetail as $key => $value)
        <div class="div1">
          {{-- @dd($activityDetail) --}}
          @switch($key)
              @case(1)
                  <h3>Sholat Wajib</h3>
                  @break
              @case(2)
                  <h3>Sholat Rawatib</h3>
                  @break
              @case(3)
                  <h3>Sholat Sunnah</h3>
                  @break
              @case(4)
                  <h3>Amalan Sunnah Lainnya</h3>
                  @break
              @default
                  <h3>Dzikir</h3>
          @endswitch

            <div class="activity-container">
                <table>
                  <tr>
                      <th></th>
                      <th class="{{ $today == 1 ? "today" : "" }}">Sen</th>
                      <th class="{{ $today == 2 ? "today" : "" }}">Sel</th>
                      <th class="{{ $today == 3 ? "today" : "" }}">Rab</th>
                      <th class="{{ $today == 4 ? "today" : "" }}">Kam</th>
                      <th class="{{ $today == 5 ? "today" : "" }}">Jum</th>
                      <th class="{{ $today == 6 ? "today" : "" }}">Sab</th>
                      <th class="{{ $today == 7 ? "today" : "" }}">Ahd</th>
                  </tr>
                @foreach ($value as $activity => $submissions)
                <tr>
                    <td class="name-activity">{{ $activity }}</td>
                    @foreach ($submissions as $index => $sub)
                      <td class="{{ $index == $today - 1 ? "today" : "" }}">
                        @switch($sub)
                          @case(1)
                            <div class="dot doing"></div>
                            @break
                          @case(0)
                            <div class="dot not-doing"></div>
                            @break
                          @default
                            <div class="dot no-value"></div>
                        @endswitch
                      </td>
                    @endforeach
                  </tr>
                @endforeach
                </table>
            </div>
          </div>
        @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const labels = {!! json_encode($activities) !!};
    const weekNow = {!! json_encode($totalCurent) !!};
    const weekBefore = {!! json_encode($totalPass) !!};
    document.querySelector(".chart").style.setProperty("--activity", labels.length);

    console.log(weekBefore);
    console.log(weekNow);

    const data = {
      labels: labels,
      datasets: [{
        data: weekBefore,
        backgroundColor: '#CCEDEC',
        categoryPercentage: 0.5,
        barPercentage: 0.4,
        borderRadius: 20,
      },{
        data: weekNow,
        backgroundColor: '#00A7A0',
        categoryPercentage: 0.5,
        barPercentage: 0.4,
        borderRadius: 20,
      }]
    };

    const config = {
      type: 'bar',
      data: data,
      options: {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            ticks: {
              stepSize: 1,
              color: "#6e6e6e",
              padding: 5
            },
          },
          x: {
            ticks: {
              maxTicksLimit: 0,
              color: "#000"
            },
          },
        },
      }
    }

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  </script>
@endsection