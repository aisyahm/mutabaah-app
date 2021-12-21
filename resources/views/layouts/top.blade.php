<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layout Top</title>
    {{-- css --}}
    <link rel="stylesheet" href="../css/layouttop/style.css" >
    {{-- FA 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
  <div class="contenttop">
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
          <div class="box-ubah">
            <div class="box-edit">
              <h1>Edit Grup</h1>
            </div>
            <div class="box-hapus">
              <h1>Hapus Grup</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="info2 info-all">
        <div class="text1 text-all">Analisis</div>
        <div class="text2 text-all">Anggota()</div>
        <div class="text3 text-all">Target</div>
      </div>
      <div class="info3 info-all">
        
        @yield('contenttop')
        
      </div>
    </section>
  </div>
  <script>
      const icon= document.querySelector('.fa-ellipsis-v');
      const body = document.querySelector('.info2');
      const body2 = document.querySelector('.info3');
      const container = document.querySelector('.box-ubah');

      icon.addEventListener('click', () => {
        container.classList.add("active");
      });

      body.addEventListener('click', () => {
        container.classList.remove("active");
      });
      body2.addEventListener('click', () => {
        container.classList.remove("active");
      });
  </script>