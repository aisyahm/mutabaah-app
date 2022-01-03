@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;
  use App\Models\UserGroup;
  use App\Models\GroupActivity;  

  $users = UserGroup::where("group_id", $group->id)->get();
  $usersIn = $users->where("is_accept", true);

  $membersIn = [];
  foreach ($usersIn as $user) {
    $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
  }
@endphp

<link rel="stylesheet" href="/css/layouttop/style.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
      /* none */
      .info1{
          height: 83px;
      }
      .info1 .icon .box-ubah{
          height: 55px;
      }
      .box-ubah .box-edit{
          height: 100%;
      }
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
          <div class="group" style="cursor: default">
            <h6>{{ $group->name }}</h6>
            <p>{{ $group->description}}</p>
          </div>
        </div>
        <div class="icon">
          <i class="fas fa-ellipsis-v"></i>
          <div class="box-ubah">
            <div class="box-edit box-keluar">
              <h1>Keluar Grup</h1>
            </div>
          </div>
        </div>
      </div>
      @if (count(GroupActivity::where("group_id", $group->id)->get()))
          <div class="info2 info-all">
            <a href="{{ route("group-activities", $group->id) }}" class="text1 text-all {{ Request::segment(2) == "activities" ? "active" : "" }}" >
              Target
            </a>
            <a href="{{ route("chart-member", ["userId" => Auth::user()->id, "groupId" => $group->id]) }}" class="text1 text-all {{ Request::segment(2) == "analysis" ? "active" : "" }}">
              Analisis
            </a>
            <a href="/groups/anggota/{{ $group->id }}" class="text2 text-all {{ Request::segment(2) == "anggota" ? "active" : "" }}">
              Anggota ({{ count($membersIn) }})
            </a>
          </div>
      @endif
    </div>
    
      {{-- Keluar Grup --}}
      <div class="pop-up member-keluar-group-pop-up">
        <div class="pop-up-title">
          <h3>Konfirmasi keluar Grup: {{ $group->name }}</h3>
          <i class="fas fa-times close"></i>
        </div>
        <div class="box-hapus-text">
          <h5>Apakah Kamu Yakin untuk Keluar Grup? apabila yakin bisa klik Keluar dan apabila tidak yakin bisa klik batal atau silang</h5>
        </div>
        <div class="box-hapus-button">
          <button class="btn-batal">Batal</button>
          <form action="{{ route("delete") }}" method="post" class="form-hapus">
            @csrf
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            {{-- <button class="btn-hapus" type="submit" id="danger-btn" name="leave" value="1" onclick="return confirm('Yakin ingin menghapus grup ini?')">Keluar</button> --}}
            <button class="btn-hapus" type="submit" id="danger-btn" name="leave" value="1">Keluar</button>
          </form>
        </div>
      </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
      const icon= document.querySelector('.fa-ellipsis-v');
      const body = document.querySelector('.info2');
      const container = document.querySelector('.box-ubah');

      icon.addEventListener('click', (e) => {
        container.classList.toggle("active");
      });

      body.addEventListener('click', (ev) => {
        // container.classList.remove("active");
        ev.stopPropagation();
      });

      const boxkeluar = document.querySelector(".box-keluar");
      const closes = document.querySelectorAll(".close");
      membergrupkeluar = document.querySelector(".member-keluar-group-pop-up");
      const body3 = document.querySelector('.info2');
      const batals = document.querySelectorAll(".btn-batal");

      closes.forEach(close => {
        close.addEventListener("click", () => {
          shadowPopUp.classList.remove("active");
          membergrupkeluar.classList.remove("active");
        })
      });

      batals.forEach(batal => {
        batal.addEventListener("click", () => {
          shadowPopUp.classList.remove("active");
          membergrupkeluar.classList.remove("active");
        })
      });

    //  keluar remove
      boxkeluar.addEventListener("click", () => {
        shadowPopUp.classList.add("active");
        container.classList.remove("active");

        shadowPopUp.addEventListener(("click"), () => {
          popUpGroup.classList.remove("container");
          shadowPopUp.classList.remove("active");
          membergrupkeluar.classList.remove("active");
        });
      })
      // edit
      const memberkeluar = () => {
        membergrupkeluar.classList.add("active");

          closeBtn.forEach((close) => {
              close.addEventListener("click", () => {
                membergrupkeluar.classList.remove("active");
              });
          });
      };
      body3.addEventListener('click', () => {
        membergrupkeluar.classList.remove("active");
      });
      boxkeluar.addEventListener("click", memberkeluar);
  </script>