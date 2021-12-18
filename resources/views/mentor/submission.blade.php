@extends("mentor.template")
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mentor Analisis</title>
  {{-- css --}}
  <link rel="stylesheet" href="../css/mentor/style.css" >
  {{-- FA 6 --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  {{-- chartjscdn --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
  @section('content')
  {{-- <header> --}}
    {{-- <nav>
      <div class="logo-app">
        <div class="img">
         <img src="" alt="">Logo <span>Mentor</span>
        </div>
         <div class="atas">
            <li><a href="#">Buat Grup Baru  <i class="fas fa-plus-square"></i></a></li>
            <li><a href="#">Daftar Grup</a></li>
        </div>
      </div>
        <ul>
          <li><a href="#"><i class="far fa-user logos"></i> Akun Saya</a></li>
          <li><a href="#"><i class="fas fa-sign-out-alt logos"></i> Logout</a></li>
        </ul>
    </nav> --}}
    <div class="content">
      <section>
        <div class="info1 info-all">
          <img src="../assets/img/group.jpg" alt="">
          <div class="text1">
            <h6>Nama Grup</h6>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, accusantium.</p>
            <div class="input-code">
              <button>
              <input type="text" name="" id="" placeholder="Kode Grup: 782H234xxx">
                <span>Salin</span>
              </button>
            </div>
          </div>
          <div class="icon">
            <i class="fas fa-ellipsis-v"></i>
          </div>
        </div>
        <div class="info2 info-all">
          <div class="text1 text-all">Analisis</div>
          <div class="text2 text-all">Anggota(6)</div>
          <div class="text3 text-all">Target</div>
        </div>
        <div class="info3 info-all">
          <h1>Statistik Amalan Harian <span>21 Nov 2021</span></h1>
          <a href="/home/mentoranalisis/exportsubmission"><button>Download laporan</button> </a>
        </div>
        <div class="info4">
          <div class="bar-chart1">
            <canvas id="barChart">
            </canvas>
          </div>

          <div class="bar-chart2"></div>
          <div class="bar-chart3"></div>
        </div>
      </section>
    </div>

    <script>
      $(function(){
        var datas = <?php echo json_encode($datas); ?>;
        var barCanvas = $("#barChart");
        var barChart = new Chart(barCanvas,{
          type:'bar',
          data:{
            labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets:[
              {
                label:'Shalat Wajib',
                data:datas,
                backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
              }
            ]
          },
          options:{
              animations: {
              tension: {
                duration: 1000,
                easing: 'linear',
                from: 1,
                to: 0,
                loop: true
              }
            },
            scales:{
              y: { // defining min and max so hiding the dataset does not change scale range
        min: 0,
        max: 100
      },
              yAxes:[{
                ticks:{
                  beginAtZero:true
                }
              }]
            }
          }
        });
      })
    </script>


    
  {{-- </header> --}}
@endsection