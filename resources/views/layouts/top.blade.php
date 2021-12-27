@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;

  $group = last(request()->segments());
  dd($group);
@endphp

@extends('main.template')
    {{-- css --}}
    <link rel="stylesheet" href="../css/layouttop/style.css" >
    {{-- FA 6 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
  <div class="contenttop">
    <section>
      <div class="info1 info-all">
        <div class="text1">
          <img src="../assets/img/group.jpg" alt="">
          <div class="group">
            <h6>APAI ILKOMP-A</h6>
            <p>Grup menuju surga para peserta hijrah jurusan Pertukangan kampus Teknologi Mars</p>
            <div class="input-code">
              <button>
                <p>Kode Grup: <span id="p1" class="text-kode" >782Hxxxx</span></p>
                <span class="text-salin" onclick="copy('#p1')">Salin</span>
              </button>
            </div>
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
        
        @yield('content-top')
        
      </div>
    </section>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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

      function copy(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
      }

  </script>