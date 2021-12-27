@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;
@endphp

<link rel="stylesheet" href="/css/layouttop/style.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Hapus Grup */
    .box-hapus-text{
      position: relative;
      width: 95%;
      height: 100%;
      font-style: normal;
      font-weight: normal;
      text-align: justify;
      font-size: 14px;
      line-height: 20px;
      color: #38524A;
    }
    .box-hapus-button{
      display: flex;
    }
    .box-hapus-button .btn-batal{
      color: #38524A;
      background: #F8F8F8;
      margin-right: 16px;
      width: 161px;
      height: 52px;
      border: 1px solid #D7DCDB;
    }
    .form-hapus{
      width: 264px!important;
      height: 52px!important;
    }
    .form-hapus .btn-hapus{
      width: 200px!important;
      height: 52px!important;
      background: #F2758F!important;
      border-radius: 8px;
    }
  </style>
    
  <div class="contenttop">
      <div class="info1 info-all">
        <div class="text1">
          <img src="/assets/ava/{{ $group->avatar }}.svg">
          <div class="group">
            <h6>{{ $group->name }}</h6>
            <p>{{ $group->description }}</p>
            <div class="input-code">
              <button>
                <p>Kode Grup: <span id="p1" class="text-kode" >{{ $group->invitation_code }}</span></p>
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
        <div class="text1 text-all {{ Request::segment(2) == "analysis" ? "active" : "" }}">Analisis</div>
        <div class="text2 text-all {{ Request::segment(2) == "member" ? "active" : "" }}">Anggota ({{ count($membersIn) }} Orang)</div>
        <div class="text3 text-all {{ Request::segment(2) == "target" ? "active" : "" }}">Target</div>
      </div>
      <div class="info3 info-all">
        {{-- download laporan --}}
        <h1>Statistik Amalan Harian <span>21 Nov 2021</span></h1>
        <a href="/home/mentoranalisis/exportlaporan">
            <button>Download laporan</button>
        </a>
      </div>
  </div>
   {{-- Edit Grup --}}
    <div class="pop-up mentor-group-pop-up">
        <div class="pop-up-title">
        <h3>Edit Grup</h3>
        <i class="fas fa-times close"></i>
        </div>
        <form action="{{ route('edit-grup') }}" method="POST">
        @csrf
        <label>Pilih Avatar<span>*</span></label>
        <div class="ava-container">
            <div class="ava">
            <input type="radio" name="avatar" value="1" >
            <span id="mentor"></span>
            <img src="/assets/ava/1.svg">
            </div>
            <div class="ava">
            <input type="radio" name="avatar" value="2" >
            <span id="mentor"></span>
            <img src="/assets/ava/2.svg">
            </div>
            <div class="ava">
            <input type="radio" name="avatar" value="3" checked >
            <span id="mentor"></span>
            <img src="/assets/ava/3.svg">
            </div>
            <div class="ava">
            <input type="radio" name="avatar" value="4" >
            <span id="mentor"></span>
            <img src="/assets/ava/4.svg">
            </div>
            <div class="ava">
            <input type="radio" name="avatar" value="5" >
            <span id="mentor"></span>
            <img src="/assets/ava/5.svg">
            </div>
        </div>

        <label for="name">Nama grup<span>*</span></label>
        <input
        type="text"
        id="name"
        name="name"
        autofocus value="{{ old("name") }}" 
        autocomplete="off"
        required
        />

        <label for="desc">Deskripsi grup<span>*</span></label>
        <textarea
        id="desc"
        name="desc"
        cols="30"
        rows="10"
        autocomplete="off"
        placeholder="Masukkan deskripsi grup"
        required>
        </textarea>
        <h4 class="wajib"><span>*</span>Wajib diisi</h4>
        <button type="submit">Simpan</button>

        </form>
    </div>

    {{-- Hapus Grup --}}
    <div class="pop-up mentor-hapus-group-pop-up">
        <div class="pop-up-title">
        <h3>Konfirmasi hapus Grup: NAMA Grup</h3>
        <i class="fas fa-times close"></i>
        </div>
        <div class="box-hapus-text">
        <h5>Data grup yang telah dihapus tidak bisa dikembalikan. Mohon pastikan data yang anda butuhkan sudah di export sebelumnya.</h5>
        </div>
        <div class="box-hapus-button">
        <button class="btn-batal">Batal</button>
            <form action="" method="post" class="form-hapus">
            {{-- <form action="{{ route("delete") }}" method="post"> --}}
                @csrf
                {{-- <input type="hidden" name="group_id" value="{{ $group->id }}"> --}}
                <input type="hidden" name="group_id" value="">
                <button class="btn-hapus" type="submit" id="danger-btn" name="delete" value="1" onclick="return confirm('Yakin ingin menghapus grup ini?')">Hapus</button>
            </form>
        </div>
    </div>


    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
      const icon= document.querySelector('.fa-ellipsis-v');
      const body = document.querySelector('.info2');
      const container = document.querySelector('.box-ubah');

      icon.addEventListener('click', () => {
        container.classList.add("active");
      });

      body.addEventListener('click', () => {
        container.classList.remove("active");
      });


      function copy(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
      }

      const boxedit = document.querySelector(".box-edit");
      const closes = document.querySelectorAll(".close");
      const boxhapus = document.querySelector(".box-hapus");
      mentorgrupedit = document.querySelector(".mentor-group-pop-up");
      mentorgruphapus = document.querySelector(".mentor-hapus-group-pop-up");
      const body3 = document.querySelector('.info2');

      closes.forEach(close => {
        close.addEventListener("click", () => {
          shadowPopUp.classList.remove("active");
          mentorgrupedit.classList.remove("active");
          mentorgruphapus.classList.remove("active");
        })
      });

    //   edit remove
      boxedit.addEventListener("click", () => {
        shadowPopUp.classList.add("active");
        container.classList.remove("active");

        shadowPopUp.addEventListener(("click"), () => {
          popUpGroup.classList.remove("container");
          shadowPopUp.classList.remove("active");
          mentorgrupedit.classList.remove("active");
        });
      })
    //   Hapus remove
    boxhapus.addEventListener("click", () => {
        shadowPopUp.classList.add("active");
        container.classList.remove("active");

        shadowPopUp.addEventListener(("click"), () => {
          popUpGroup.classList.remove("container");
          shadowPopUp.classList.remove("active");
          mentorgruphapus.classList.remove("active");
        });
      })
      // edit
      const mentoredit = () => {
        mentorgrupedit.classList.add("active");

          closeBtn.forEach((close) => {
              close.addEventListener("click", () => {
                mentorgrupedit.classList.remove("active");
              });
          });
      };
      body3.addEventListener('click', () => {
          mentorgrupedit.classList.remove("active");
      });
      boxedit.addEventListener("click", mentoredit);

      // Hapus
      const mentorhapus= () => {
        mentorgruphapus.classList.add("active");

          closeBtn.forEach((close) => {
              close.addEventListener("click", () => {
                mentorgruphapus.classList.remove("active");
              });
          });
      };
      body3.addEventListener('click', () => {
        mentorgruphapus.classList.remove("active");
      });
      boxhapus.addEventListener("click", mentorhapus);
  </script>