@extends("mentor.template")
@extends("layouts.top") 
@section('contenttop')
        <style>
            /* avatar mentor */
            .ava-container .ava span#mentor {
                left: 1rem;
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
              width: 264px!important;
              height: 52px!important;
              background: #F2758F!important;
              border-radius: 8px;
            }
        </style>

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
              @foreach ($group as $grup)
              type="text"
              id="name"
              name="name"
              autofocus value="{{ old("name") }}" 
              autocomplete="off"
              placeholder="{{ $grup->name }}"
              value="{{ $grup->name }}"
              required
              @endforeach
              />

              <label for="desc">Deskripsi grup<span>*</span></label>
              <textarea
              id="desc"
              name="desc"
              cols="30"
              rows="10"
              autocomplete="off"
              placeholder="Masukkan deskripsi grup"
              {{-- value="{{ $grup->name }}" --}}
              required
              >{{ $grup->description }}</textarea>
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

          <script>
                const boxedit = document.querySelector(".box-edit");
                const close = document.querySelector(".close");
                const boxhapus = document.querySelector(".box-hapus");
                mentorgrupedit = document.querySelector(".mentor-group-pop-up");
                mentorgruphapus = document.querySelector(".mentor-hapus-group-pop-up");
                const body3 = document.querySelector('.info2');

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
@endsection
