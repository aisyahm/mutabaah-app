<style>
  /* SCROLL BAR */
  ::-webkit-scrollbar {
    height: 6px;
  }
  ::-webkit-scrollbar-track {
    background: #ebebeb;
  }
  ::-webkit-scrollbar-thumb {
    background: rgb(206, 206, 206);
    border-radius: 10px;
  }

  .container {
    width: max-content;
  }
  .inner {
    width: 900px;
    height: 230px;
    overflow: auto;
    visibility: hidden;
    transition: visibility .3s;
  }
  .inner:hover {
    transition: visibility 0s .2s;
  }
  .inner:hover,
  .inner:focus,
  .chart {
    visibility: visible;
  }
  
  .container, .inner, .legend {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .chart {
    --activity: 0;
    width: calc(var(--activity) * 82px);
    height: 98%;
  }
  .legend {
    flex-direction: row;
  }
  .legend > span {
    display: flex;
    align-items: center;
    margin-top: 1rem;
    margin-right: 2rem;
  }
  span > span {
    display: inline-block;
    width: 30px;
    height: 5px;
    border-radius: 2px;
    margin-right: 1rem;
  }
  .legend span:nth-child(1) > span {
    background: #CCEDEC;
  }
  .legend span:nth-child(2) > span {
    background: #00A7A0;
  }
</style>

<div class="container">
  <div class="inner">
    <div class="chart">
      <canvas id="myChart"></canvas>
    </div>
  </div>
  <div class="legend">
    <span><span></span>Kemarin</span>
    <span><span></span>Hari Ini</span>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // const labels = [
  //   ['Sholat', 'Subuh'],
  //   ['Sholat', 'Dzuhur'],
  //   ['Sholat', 'Ashar'],
  //   ['Sholat', 'Magrib'],
  //   ['Sholat', 'Isya'],
  //   ['Sholat', 'Dhuha'],
  //   ['Sholat', 'Tahajjud'],
  //   ['Sholat', 'Subuh'],
  //   ['Sholat', 'Dzuhur'],
  //   ['Sholat', 'Ashar'],
  //   ['Sholat', 'Magrib'],
  //   ['Sholat', 'Isya'],
  //   ['Sholat', 'Dhuha'],
  //   ['Sholat', 'Tahajjud']
  // ];
  const labels = {!! json_encode($activities) !!};

  document.querySelector(".chart").style.setProperty("--activity", labels.length);

  const data = {
    labels: labels,
    datasets: [{
      label: 'Kemarin',
      data: [2,3,1,4,4,5,3,2,3,1,4,4,5,3],
      backgroundColor: '#CCEDEC',
      borderColor: 'rgba(255, 255, 255, 0)',
      borderWidth: 5,
      barThickness: 20,
      borderRadius: 20,
    },{
      label: 'Hari Ini',
      data: [1,2,4,5,2,4,5,1,2,4,5,2,4,5],
      backgroundColor: '#00A7A0',
      borderColor: 'rgba(255, 255, 255, 0)',
      borderWidth: 5,
      barThickness: 20,
      borderRadius: 20,
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      maintainAspectRatio: false,
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