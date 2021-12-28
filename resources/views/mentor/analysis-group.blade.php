@php
  $i = 1;
@endphp
@extends("mentor.template")

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
@endsection

@section('content')
  @if (count($activities) != 0)

    {{-- CHART PER CATEGORY ACTIVITY --}}
    @foreach ($activityDetail as $key => $value)
      <div class="chart-container">
          @switch($key)
              @case(1)
                  <div class="chart-title">
                    <h3>Sholat Wajib</h3>
                  </div>
                  <div class="inner">
                    <div class="chart">
                      <canvas id="wajibChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(2)
                  <div class="chart-title">
                    <h3>Sholat Rawatib</h3>
                  </div>
                  <div class="inner">
                    <div class="chart">
                      <canvas id="rawatibChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(3)
                  <div class="chart-title">
                    <h3>Sholat Sunnah</h3>
                  </div>
                  <div class="inner">
                    <div class="chart">
                      <canvas id="sunnahChart"></canvas>
                    </div>
                  </div>
                  @break
              @case(4)
                  <div class="chart-title">
                    <h3>Sholat Sunnah Lainnya</h3>
                  </div>
                  <div class="inner">
                    <div class="chart">
                      <canvas id="lainnyaChart"></canvas>
                    </div>
                  </div>
                  @break
              @default
                  <div class="chart-title">
                    <h3>Dzikir</h3>
                  </div>
                  <div class="inner">
                    <div class="chart">
                      <canvas id="dzikirChart"></canvas>
                    </div>
                  </div>
          @endswitch
        <div class="legend">
          <span><span></span>Kemarin</span>
          <span><span></span>Hari Ini</span>
        </div>
    </div>
    @endforeach
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
  @endif

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const labels = {!! json_encode($activities) !!};
    const weekNow = {!! json_encode($averageCurent) !!};
    const weekBefore = {!! json_encode($averagePass) !!};
    const rangking = {!! json_encode($rangking) !!};
    const member = document.querySelectorAll(".grid-rank > div");
    document.querySelector(".chart").style.setProperty("--activity", labels.length);
    
    if (rangking) {
      document.querySelector(".grid-rank").style.setProperty("--row", Math.ceil(member.length / 2));
    }

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

    const averageChart = new Chart(
      document.getElementById('averageChart'),
      config
    );
  </script>
@endsection