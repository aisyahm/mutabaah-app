@extends('member.template')

@section('meta')
  <link rel="stylesheet" href="/css/analysis.css" />
@endsection

@section('content')
  <div class="header-content">
    <h2>Statistik Amalan Pribadi</h2>
    <a href="/download-laporan">Download Laporan</a>
  </div>
  <div class="chart-container">
    <div class="chart-title">
      <h3>Amalan Sepekan</h3>
      <h4>Week 3 Nov 2021 vs  <span>Week 4 Nov 2021</span></h4>
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
    // const labels = [
    //   ['Sholat', 'Subuh'],
    // ];

    const labels = {!! json_encode($activities) !!};
    const average = {!! json_encode($average) !!};
    document.querySelector(".chart").style.setProperty("--activity", labels.length);

    const data = {
      labels: labels,
      datasets: [{
        data: [2,3,1,4,4],
        backgroundColor: '#CCEDEC',
        categoryPercentage: 0.5,
        barPercentage: 0.4,
        borderRadius: 20,
      },{
        data: average,
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


