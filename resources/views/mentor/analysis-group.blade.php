@php
  $i = 1;
@endphp
@extends("mentor.template")

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
@endsection

@section('content')
  <div class="rank-container">
    <div class="ranking"> 
      <h3>Ranking Anggota per Pekan Ini</h3>
    </div>
    <div class="grid-rank">
      @foreach ($rangking as $name => $rank)
          
          @switch ($rank)
            @case ($topRated[0])
              <div class="div-medal">
                <img src="/medal1.png" alt="" class="medal">
                <p>{{ $name }}<span> {{ round(($rank / ($totalActivity * 7)) * 100) }} %</span> </p>
                <hr>
              </div>
              @break
            @case ($topRated[1])
              <div class="div-medal">
                <img src="/medal2.png" alt="" class="medal">
                {{ $name }} <span> {{ round(($rank / ($totalActivity * 7)) * 100) }}% </span> 
                <hr>
              </div>
              
              @break
            @case ($topRated[2])
              <div class="div-medal">
                <img src="/medal3.png" alt="" class="medal">
                {{ $name }} <span> {{ round(($rank / ($totalActivity * 7)) * 100) }}% </span> 
                <hr>
              </div>
              
              @break
            @default
              <div>
                {{ $name }} . {{ round(($rank / ($totalActivity * 7)) * 100) }}% 
                <hr>
              </div>
              <hr>
          @endswitch
          
          @php $i++; @endphp
      @endforeach
    </div>
  </div>

  <div class="chart-container">
    <div class="chart-title">
      <h3>Rata-Rata Amalan Sepekan</h3>
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
    const weekNow = {!! json_encode($averageCurent) !!};
    const weekBefore = {!! json_encode($averagePass) !!};
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