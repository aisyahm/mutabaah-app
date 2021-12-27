@extends(Auth::user()->is_mentor ? "mentor.template" : "member.template")

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
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
    <a href="/download-laporan">Download Laporan</a>
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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const labels = {!! json_encode($activities) !!};
    const weekNow = {!! json_encode($totalCurent) !!};
    const weekBefore = {!! json_encode($totalPass) !!};
    document.querySelector(".chart").style.setProperty("--activity", labels.length);

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