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

  <div class="detail-activity-container">
    <div class="title-detail-amalan">
        <h3>Detail Amalan</h3>
        <p>22 Nov - 28 Nov 2021</p>
    </div>
    <div class="ket-container">
        <p style="font-weight: bold;">Keterangan</p>
    </div>
    <div class="parent">
        <div class="div1">
            <h3>Shalat Wajib</h3>
            <div class="activity-container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Subuh</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ashar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div2">
            <h3>Sholat Rawatib</h3>
            <div class="activity-container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Subuh</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ba’diyah Dzuhur</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Asar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat  Ba’diyah Maghrib</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Qabliyah Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Ba’diyah Isya</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div3">
            <h3>Shalat Sunnah</h3>
            <div class="activity-container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Sholat Dhuha</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholat Tahajud</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div4">
            <h3>Amalan Sunnah</h3>
            <div class="activity-container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Puasa Sunnah</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Baca Al-Qur'an</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Infaq</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Kajian</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>

        <div class="div5">
            <h3>Dzikir</h3>
            <div class="activity-container">
                <table>
                <tr>
                    <th></th>
                    <th>Sen</th>
                    <th>Sel</th>
                    <th>Rab</th>
                    <th>Kam</th>
                    <th>Jum</th>
                    <th>Sab</th>
                    <th>Ahd</th>
                </tr>
                <tr>
                    <td>Dzikir Pagi</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-false"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-true"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Dzikir Petang</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Istighfar</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                <tr>
                    <td>Sholawat</td>
                    <td><div class="dot haid"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot past-true"></div></td>
                    <td><div class="dot today-false"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                    <td><div class="dot no-value"></div></td>
                </tr>
                </table>
            </div>
        </div>
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