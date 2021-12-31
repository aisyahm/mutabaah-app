<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/register.css" />
    <link rel="stylesheet" href="/css/my-style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet" />

    <title>Register</title>
  </head>

  <body>
    <nav class="navbar">
      <img src="/assets/img/logo.png" class="app-logo" />
    </nav>

    <center>
      <div class="not-match {{ $errors->any() ? "alert" : ""}}">
         @if($errors->any())
         <div>
           {{ $errors->first() }}
         </div>
         @endif
      </div>

      <form action="{{ route("register") }}" method="POST" class="login shadow-sm px-6 my-mt-login">
        @csrf
        <h1>Register</h1>
        <h5>Silahkan isi data untuk register akun</h5>

        <div class="data-form">
          <label class="my-fo-size mt-3"
            ><b>Daftar sebagai<span class="my-color-red">*</span></b></label
          >
          <div class="user">
            <div class="anggota my-radio-style shadow-sm">
              <input type="radio" name="is_mentor" id="member" value="0" required />
              <label for="member"><b>Anggota</b></label>
            </div>
            <div class="mentor my-radio-style shadow-sm">
              <input type="radio" name="is_mentor" id="mentor" value="1" required />
              <label for="mentor"><b>Mentor</b></label>
            </div>
          </div>

          <h3 class="check-member">Pastikan sudah punya grup yang dibuatkan mentormu, ya!</h3>

         
          <label for="name" class="my-fo-size mt-3"
              ><b>Nama Lengkap<span class="my-color-red">*</span></b></label
          >
          @error('name')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
          @enderror

          <input name="name" type="text" placeholder="Masukkan Nama Lengkap" class="shadow-sm rounded form-control my-fo-size my-bg-color-2 input @error('name') is-invalid @enderror" id="name" required value="{{ old('name') }}" />

          <label for="email" class="my-fo-size mt-3"
              ><b>Email<span class="my-color-red">*</span></b></label
          >
          @error('email')
              <div class="invalid-feedback">
              {{ $message }}
              </div>
          @enderror
          <input name="email" type="email" placeholder="Masukkan email" class="shadow-sm rounded form-control my-fo-size my-bg-color-2 input @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}" />

          <label for="no_telp" class="my-fo-size mt-3"
            ><b>No HP<span class="my-color-red">*</span></b></label
          >
          @error('no_telp')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <input name="no_telp" type="text" placeholder="Masukkan nomor telepon" class="shadow-sm rounded form-control my-fo-size my-bg-color-2 input @error('no_telp') is-invalid @enderror" id="no_telp" required value="{{ old('no_telp') }}" />
          
          <label class="gender">Gender<span class="my-color-red">*</span></label>
          <div class="user">
            <div class="anggota my-radio-style shadow-sm">
              <input type="radio" name="gender" id="akhi" value="Akhi" required />
              <label for="akhi"><b>Ikhwan</b></label>
            </div>
            <div class="mentor my-radio-style shadow-sm">
              <input type="radio" name="gender" id="ukhti" value="Ukhti" required />
              <label for="ukhti"><b>Akhwat</b></label>
            </div>
          </div>
          
          <label for="password" class="my-fo-size my-mt-login"><b>Password<span class="my-color-red">*</span></b></label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
          <input name="password" type="password" placeholder="Masukkan Password" class="shadow-sm rounded form-control my-fo-size my-bg-color-2 input @error('password') is-invalid @enderror" id="password" required />
          
          <label for="confirm" class="my-fo-size my-mt-login"><b>Konfirmasi Password<span class="my-color-red">*</span></b></label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
          <input name="confirm" type="password" placeholder="Masukkan Kembali Password" class="shadow-sm rounded form-control my-fo-size my-bg-color-2 input @error('password') is-invalid @enderror" required />
          
          <div class="wajib-isi my-mt-login">
            <h4>*Wajib disi</h4>
          </div>
          
          <button type="submit" class="btn btn-login my-bg-color">Register Akun</b>
          </button>
        </div>
      </form>

      <div class="regist-link my-fo-size my-mt-login has-account">
      <label>Sudah punya akun? <a class="my-color" href="{{ route("login") }}">Login disini</a></label>
      </div>
    </center>
    
    <!-- SCRIPT -->
    <script>
      const radioRole = document.querySelectorAll("input[name='is_mentor']");
      const radioGender = document.querySelectorAll("input[name='gender']");
      const checkMember = document.querySelector(".check-member");

      const checkRole = (index) => {
        radioRole.forEach(radio => {
          radioRole[index].parentElement.classList.contains('active') ? '' : radio.parentElement.classList.remove('active');
        });

        checkMember.classList.toggle("active");
        
        radioRole[index].parentElement.classList.toggle('active');
      }
      const checkGender = (index) => {
        radioGender.forEach(radio => {
          radioGender[index].parentElement.classList.contains('active') ? '' : radio.parentElement.classList.remove('active');
        });
        
        radioGender[index].parentElement.classList.toggle('active');
      }
      

      radioRole.forEach((radio, index) => {
        radio.addEventListener("change", () => {
          checkRole(index);
        })
      });
      radioGender.forEach((radio, index) => {
        radio.addEventListener("change", () => {
          checkGender(index);
        })
      });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
