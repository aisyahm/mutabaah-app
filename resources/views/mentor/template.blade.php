@php
  use App\Models\UserGroup;
  use Illuminate\Support\Facades\Auth;

  $groupsTemplate = UserGroup::with("group")->where("user_id", Auth::user()->id)->get();
  $groupsInTemplate = [];
  $membersInTemplate = [];

  $groupsAcceptTemplate = $groupsTemplate->where("is_accept", true);
  $groupsInTemplate = [];

  foreach ($groupsAcceptTemplate as $groupAcc) {
    $groupsInTemplate[] = $groupAcc->group;
    $membersInTemplate[] = $groupAcc->where("group_id", $groupAcc->group->id)->where("is_accept", true)->count() - 1;
  }

  $memberPending = [];
  foreach ($groupsTemplate as $group) {
    if (!is_null(UserGroup::with("group")->where("group_id", $group->group_id)->where("is_accept", false)->first())) {
      $memberPending[] = true;
    } else {
      $memberPending[] = false;
    }
  }
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/main.css" />
    @yield('meta')
    <title>Istiqomah</title>
  </head>
  <body>
    <header>
      <div class="container">
        <div class="logo-container">
          <a href="{{ route("home") }}"><div class="logo"><img src="/assets/img/logo.png" class="logo-img" /></div></a>
          <h3 class="role mentor">Mentor</h3>
        </div>
        <div class="group-container">
          <div class="new-group">
            <h3>Buat grup</h3>
            <i class="new-group-btn fas fa-plus"></i>
          </div>
          {{-- @dd(count($memberPending)) --}}

            @if ($groupsInTemplate)
              @for ($i = 0; $i < count($groupsInTemplate); $i++)
                <a href="/groups/analysis/{{ $groupsInTemplate[$i]->id }}">
                  <div class="group {{ last(request()->segments()) == $groupsInTemplate[$i]->id ? "active" : "" }}">
                    <div class="ava-group">
                      <img src="/assets/ava/{{ $groupsInTemplate[$i]->avatar }}.svg" alt="">
                    </div>
                    <div class="content-group">
                      <h4>{{ $groupsInTemplate[$i]->name }}</h4>
                      <h4>{{ $membersInTemplate[$i] }} anggota</h4>
                    </div>
                    @if ($memberPending[$i])
                        {{-- <img class="pending" src="/assets/img/alert-warning.svg"> --}}
                        <div class="pending"></div>
                    @endif
                  </div> 
                </a>
              @endfor
            @endif
        </div>
        <div class="profile-container">
          <div class="account">
            @if (strlen(Auth::user()->avatar) > 1)
              <img src="http://{{ (Auth::user()->avatar) }}">
            @else
              <img src="/assets/ava/{{ Auth::user()->avatar }}.svg">
            @endif
            <h3>{{ Auth::user()->name }}</h3>
          </div>
          <div class="logout">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" onclick="return confirm('Keluar Akun?')">
                <i class="fas fa-sign-out-alt"></i>
                <h4>Logout</h4>
              </button>
            </form>
          </div>
        </div>
      </div>
    </header>

    <main>
      <div class="pop-up new-group-pop-up">
        <div class="pop-up-title">
          <h3>Buat Grup</h3>
          <i class="fas fa-times close"></i>
        </div>
        <form action="{{ route("create") }}" method="POST">
          @csrf
          <label>Avatar Grup<span>*</span></label>
          <div class="ava-container">
            <div class="ava">
              <input type="radio" name="avatar" value="1" >
              <span></span>
              <img src="/assets/ava/1.svg">
            </div>
            <div class="ava">
              <input type="radio" name="avatar" value="2" >
              <span></span>
              <img src="/assets/ava/2.svg">
            </div>
            <div class="ava">
              <input type="radio" name="avatar" value="3" checked >
              <span></span>
              <img src="/assets/ava/3.svg">
            </div>
            <div class="ava">
              <input type="radio" name="avatar" value="4" >
              <span></span>
              <img src="/assets/ava/4.svg">
            </div>
            <div class="ava">
              <input type="radio" name="avatar" value="5" >
              <span></span>
              <img src="/assets/ava/5.svg">
            </div>
          </div>
          
          <label for="name">Nama grup<span>*</span></label>
          <input
            @if (session()->has("exist"))
              class="exist"
            @endif 

            type="text"
            id="name"
            name="name"
            autofocus value="{{ old("name") }}" 
            autocomplete="off"
            placeholder="Masukkan nama grup"
            required
          />
          @if (session()->has("exist"))
            <p class="alert">This group name exist</p>
          @endif 

          <label for="desc">Deskripsi grup<span>*</span></label>
          <textarea
            id="desc"
            name="desc"
            cols="30"
            rows="10"
            autocomplete="off"
            placeholder="Masukkan deskripsi grup"
            required
          >{{ old("desc") }}</textarea>
          <h4 class="wajib"><span>*</span>Wajib diisi</h4>
          <button type="submit">Buat grup</button>
        </form>
      </div>


      <div class="pop-up account-pop-up">
        <div class="pop-up-title">
          <h3>Akun Saya</h3>
          <i class="fas fa-times close"></i>
        </div>
        <form action="{{ route("update") }}" method="POST">
          @csrf
          @if (strlen(Auth::user()->avatar) == 1)
            <label>Avatar Profil<span>*</span></label>
            <div class="ava-container">
              <div class="ava">
                <input type="radio" name="avatar" value="1" >
                <span></span>
                <img src="/assets/ava/1.svg">
              </div>
              <div class="ava">
                <input type="radio" name="avatar" value="2" >
                <span></span>
                <img src="/assets/ava/2.svg">
              </div>
              <div class="ava">
                <input type="radio" name="avatar" value="3" checked >
                <span></span>
                <img src="/assets/ava/3.svg">
              </div>
              <div class="ava">
                <input type="radio" name="avatar" value="4" >
                <span></span>
                <img src="/assets/ava/4.svg">
              </div>
              <div class="ava">
                <input type="radio" name="avatar" value="5" >
                <span></span>
                <img src="/assets/ava/5.svg">
              </div>
            </div>
          @else
            <input type="hidden" name="avatar" value="{{ Auth::user()->avatar}}" >
          @endif
          
          <label for="name">Nama lengkap<span>*</span></label>
          <input
            type="text"
            id="name"
            name="name"
            autocomplete="off"
            value="{{ Auth::user()->name }}"
            required
          />
          <label for="description">Deskripsi<span>*</span></label>
          <textarea
            id="description"
            name="description"
            cols="30"
            rows="10"
            autocomplete="off"
            placeholder="Masukkan deskripsi"
            required
          >{{ Auth::user()->description }}</textarea>
          <label for="email">Email<span>*</span></label>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ Auth::user()->email }}"
            disabled
            required
          />
          <label for="number">No. Handphone<span>*</span></label>
          <input
            type="number"
            id="number"
            name="number"
            autocomplete="off"
            value="{{ Auth::user()->no_telp }}"
            placeholder="Masukkan nomor telepon"
            required
          />
          <h4 class="wajib"><span>*</span>Wajib diisi</h4>
          <button type="submit">Simpan Data</button>
        </form>
      </div>
      <div class="shadow"></div>

      <div class="main-container">
        @yield('content')
        

      </div>

     
    </main>
    <script
      src="https://kit.fontawesome.com/43c91d6ead.js"
      crossorigin="anonymous"
    ></script>
    <script src="/js/main.js"></script>
  </body>
</html>
