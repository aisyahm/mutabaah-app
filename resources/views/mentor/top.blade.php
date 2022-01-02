@php
  use Illuminate\Support\Facades\Auth;
  use App\Models\User;
  use App\Models\GroupActivity;  
  use App\Models\UserGroup;

  $users = UserGroup::where("group_id", $group->id)->get();
  $usersIn = $users->where("is_accept", true);

  $membersIn = [];
  foreach ($usersIn as $user) {
    $user->user->is_mentor == false ? $membersIn[] = $user->user : "";
  }

  use Carbon\Carbon;

  $today = Carbon::now()->isoFormat('D MMMM Y');
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
      @if (count(GroupActivity::where("group_id", $group->id)->get()))
        <div class="info2 info-all">
          <div class="text1 text-all {{ Request::segment(2) == "chart" ? "active" : "" }}">
            <a href="/groups/chart/{{ $group->id }}">Analisis</a>
          </div>
          <div class="text2 text-all {{ Request::segment(2) == "anggota" ? "active" : "" }}">
            <a href="/groups/anggota/{{ $group->id }}">Anggota ({{ count($membersIn) }})</a>
          </div>
          <div class="text3 text-all {{ Request::segment(2) == "activities" ? "active" : "" }}">
            <a href={{ route("group-activities", $group->id) }}>Target</a>
          </div>
        </div>
      @endif
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
              <input type="radio" name="avatar" value="1" {{  $group->avatar == 1 ? "checked" : "" }}>
              <span id="mentor"></span>
              <img src="/assets/ava/1.svg">
              </div>
              <div class="ava">
              <input type="radio" name="avatar" value="2" {{  $group->avatar == 2 ? "checked" : "" }}>
              <span id="mentor"></span>
              <img src="/assets/ava/2.svg">
              </div>
              <div class="ava">
              <input type="radio" name="avatar" value="3" {{  $group->avatar == "" ? "checked" : $group->avatar == 3 ? "checked" : "" }}>
              <span id="mentor"></span>
              <img src="/assets/ava/3.svg">
              </div>
              <div class="ava">
              <input type="radio" name="avatar" value="4"{{  $group->avatar == 4 ? "checked" : "" }} >
              <span id="mentor"></span>
              <img src="/assets/ava/4.svg">
              </div>
              <div class="ava">
              <input type="radio" name="avatar" value="5" {{  $group->avatar == 5 ? "checked" : "" }}>
              <span id="mentor"></span>
              <img src="/assets/ava/5.svg">
              </div>
          </div>

          <label for="name">Nama grup<span>*</span></label>
          <input
            type="text"
            id="name"
            name="name"
            autofocus value="{{ $group->name }}" 
            autocomplete="off"
            required
          />

          <label for="description">Deskripsi grup<span>*</span></label>
          <textarea
          id="description"
          name="description"
          cols="30"
          rows="10"
          autocomplete="off"
          placeholder="Masukkan deskripsi grup"
          required>{{ $group->description }}
          </textarea>
          <h4 class="wajib"><span>*</span>Wajib diisi</h4>
          <input type="hidden" name="group" value={{ $group->id }}>
          <button type="submit">Simpan</button>
        </form>
    </div>

    {{-- Hapus Grup --}}
    <div class="pop-up mentor-hapus-group-pop-up">
        <div class="pop-up-title">
        <h3>Konfirmasi hapus Grup: {{ $group->name }}</h3>
        <i class="fas fa-times close"></i>
        </div>
        <div class="box-hapus-text">
        <h5>Data grup yang telah dihapus tidak bisa dikembalikan. Mohon pastikan data yang anda butuhkan sudah di export sebelumnya.</h5>
        </div>
        <div class="box-hapus-button">
        <button class="btn-batal">Batal</button>
            <form action="{{ route("delete") }}" method="post" class="form-hapus">
                @csrf
                <input type="hidden" name="group_id" value="{{ $group->id }}">
                <button class="btn-hapus" type="submit" id="danger-btn" name="delete" value="1">Hapus</button>
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

      if (body) {
        body.addEventListener('click', () => {
          container.classList.remove("active");
        });
      }


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
      const batals = document.querySelectorAll(".btn-batal");


      closes.forEach(close => {
        close.addEventListener("click", () => {
          shadowPopUp.classList.remove("active");
          mentorgrupedit.classList.remove("active");
          mentorgruphapus.classList.remove("active");
        })
      });

      batals.forEach(batal => {
        batal.addEventListener("click", () => {
          shadowPopUp.classList.remove("active");
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

      if (body3) {
        body3.addEventListener('click', () => {
            mentorgrupedit.classList.remove("active");
        });
      }
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
      if(body3){
        body3.addEventListener('click', () => {
          mentorgruphapus.classList.remove("active");
        });
      }
    
      boxhapus.addEventListener("click", mentorhapus);
  </script>