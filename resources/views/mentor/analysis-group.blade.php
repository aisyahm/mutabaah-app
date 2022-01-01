@php
  $i = 1;
@endphp
@extends("mentor.template")

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
@endsection

@section('content')
  @if (count($activities) != 0)
  <div class="wrap-chart">

    {{-- CHART PER CATEGORY ACTIVITY --}}
    @foreach ($activityDetail as $key => $value)
      <div class="chart-container">
          @switch($key)
              @case(1)
                  <div class="chart-title">
                    <h3>Sholat Wajib</h3>
                  </div>
                  <div class="inner">
                    <div class="chart category-chart">
                      <canvas id="wajibChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(2)
                  <div class="chart-title">
                    <h3>Sholat Rawatib</h3>
                  </div>
                  <div class="inner">
                    <div class="chart category-chart">
                      <canvas id="rawatibChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(3)
                  <div class="chart-title">
                    <h3>Sholat Sunnah</h3>
                  </div>
                  <div class="inner">
                    <div class="chart category-chart">
                      <canvas id="sunnahChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(4)
                  <div class="chart-title">
                    <h3>Sholat Sunnah Lainnya</h3>
                  </div>
                  <div class="inner">
                    <div class="chart category-chart">
                      <canvas id="lainnyaChart"></canvas>
                    </div>
                  </div>
                  @break
              @default
                  <div class="chart-title">
                    <h3>Dzikir</h3>
                  </div>
                  <div class="inner">
                    <div class="chart category-chart">
                      <canvas id="dzikirChart"></canvas>
                    </div>
                  </div>
          @endswitch
        <div class="legend">
          <span><span></span>Pekan Lalu</span>
          <span><span></span>Pekan Ini</span>
        </div>
    </div>
    @endforeach

  </div>
  @endif


  @if (count($rangking) != 0)
  <div class="rank-container">
    <div class="ranking"> 
      <h3>Ranking Anggota Pekan Ini</h3>
    </div>
    <div class="grid-rank">
      @foreach ($rangking as $name => $rank)

          @if (count($topRated) == 1)
            <div class="div-medal">
              <img src="/assets/medal/first.svg" class="medal">
              <p>{{ $name }}</p>
              <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
            </div>
          @elseif (count($topRated) == 2)
            @switch ($rank)
              @case ($topRated[0])
                <div class="div-medal">
                  <img src="/assets/medal/first.svg" class="medal">
                  <p>{{ $name }}</p>
                  <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
                </div>
                @break

              @default
              <div class="div-medal">
                <img src="/assets/medal/second.svg" class="medal">
                <p>{{ $name }}</p>
                <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
              </div>
            @endswitch
          @else 
            @switch ($rank)
              @case ($topRated[0])
                <div class="div-medal">
                  <img src="/assets/medal/first.svg" class="medal">
                  <p>{{ $name }}</p>
                  <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
                </div>
                @break
              @case ($topRated[1])
                <div class="div-medal">
                  <img src="/assets/medal/second.svg" class="medal">
                  <p>{{ $name }}</p>
                  <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
                </div>
                @break
              @case ($topRated[2])
                <div class="div-medal">
                  <img src="/assets/medal/third.svg" class="medal">
                  <p>{{ $name }}</p>
                  <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
                </div>
                @break
              @default
                <div>
                  <p>{{ $name }}</p>
                  <p>{{ round(($rank / ($totalActivity * 7)) * 100) }}%</p>
                </div>
            @endswitch
          @endif
          
          @php $i++; @endphp
      @endforeach
    </div>
  </div>
  @endif

  <a href={{ route("report-group", $group->id) }}>Download Laporan</a>

  @if (count($activities) != 0)
  <div class="wrap-average">
    <div class="chart-container">
      <div class="chart-title">
        <h3>Rata-Rata Amalan Sepekan</h3>
        <h4>{{ $dates[0] . ' - ' . $dates[1] }} vs  <span>{{ $dates[2] . ' - ' . $dates[3] }}</span></h4>
      </div>

      {{-- CHART AVERAGE ACTIVITY --}}
      <div class="inner">
        <div class="chart">
          <canvas id="averageChart"></canvas>
        </div>
      </div>
      <div class="legend">
        <span><span></span>Pekan lalu</span>
        <span><span></span>Pekan Ini</span>
      </div>
    </div>
  </div>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    let labels = {!! json_encode($activities) !!};
    let weekNow = {!! json_encode($averageCurent) !!};
    let weekBefore = {!! json_encode($averagePass) !!};
    const rangking = {!! json_encode($rangking) !!};
    const member = document.querySelectorAll(".grid-rank > div");
    document.querySelector(".chart").style.setProperty("--activity", labels.length);
    
    if (rangking) {
      document.querySelector(".grid-rank").style.setProperty("--row", Math.ceil(member.length / 2));
    }

    let data = {
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

    let config = {
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

    const averageChart = new Chart(
      document.getElementById('averageChart'),
      config
    );
  </script>

  <script>
    const activityDetail = {!! json_encode($activityDetail) !!};
    let labelsToday = [];
    let Yesterday = [];
    let Today = [];

    for (let key in activityDetail) {
      let labelsToday = [];
      let yesterday = [];
      let today = [];
      let dataDay = {};
      for (let activity in activityDetail[key]) {
        labelsToday.push(activity.split(' '));
        yesterday.push(activityDetail[key][activity][0]);
        today.push(activityDetail[key][activity][1]);
      }

      if (Object.keys(activityDetail[key]).length == 1) {
        dataDay = {
          labels: labelsToday,
          datasets: [{
            data: yesterday,
            backgroundColor: '#CCEDEC',
            categoryPercentage: 0.1,
            barPercentage: 0.5,
            borderRadius: 20,
          },{
            data: today,
            backgroundColor: '#00A7A0',
            categoryPercentage: 0.1,
            barPercentage: 0.5,
            borderRadius: 20,
          }]
        };
      } else if (Object.keys(activityDetail[key]).length == 2) {
        dataDay = {
          labels: labelsToday,
          datasets: [{
            data: yesterday,
            backgroundColor: '#CCEDEC',
            categoryPercentage: 0.3,
            barPercentage: 0.35,
            borderRadius: 20,
          },{
            data: today,
            backgroundColor: '#00A7A0',
            categoryPercentage: 0.3,
            barPercentage: 0.35,
            borderRadius: 20,
          }]
        };
      } else if (Object.keys(activityDetail[key]).length >= 3) {
        dataDay = {
          labels: labelsToday,
          datasets: [{
            data: yesterday,
            backgroundColor: '#CCEDEC',
            categoryPercentage: 0.3,
            barPercentage: 0.5,
            borderRadius: 20,
          },{
            data: today,
            backgroundColor: '#00A7A0',
            categoryPercentage: 0.3,
            barPercentage: 0.5,
            borderRadius: 20,
          }]
        };
      }

      let configDay = {
        type: 'bar',
        data: dataDay,
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

      switch (key) {
        case "1":
          const wajibChart = new Chart(
            document.getElementById('wajibChart'),
            configDay
          );
          break;
        case "2":
          const rawatibChart = new Chart(
            document.getElementById('rawatibChart'),
            configDay
          );
          break;
        case "3":
          const sunnahChart = new Chart(
            document.getElementById('sunnahChart'),
            configDay
          );
          break;
        case "4":
          const lainnyaChart = new Chart(
            document.getElementById('lainnyaChart'),
            configDay
          );
          break;
        default:
          const dzikirChart = new Chart(
            document.getElementById('dzikirChart'),
            configDay
          );
      }
    }
  </script>
@endsection