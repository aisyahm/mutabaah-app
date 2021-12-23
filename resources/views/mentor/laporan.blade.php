@extends("mentor.template")
@extends("layouts.top") 
@section('contenttop')
        <style>
            /* avatar mentor */
            .ava-container .ava span#mentor {
                left: 1rem;
            }
        </style>
        {{-- download laporan --}}
        <h1>Statistik Amalan Harian <span>21 Nov 2021</span></h1>
        <a href="/home/mentoranalisis/exportlaporan">
            <button>Download laporan</button>
        </a>

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

          <script>
                const boxedit = document.querySelector(".box-edit"),
                mentorgrup = document.querySelector(".mentor-group-pop-up");
                const body3 = document.querySelector('.info2');

                    const mentoredit = () => {
                        mentorgrup.classList.add("active");

                        closeBtn.forEach((close) => {
                            close.addEventListener("click", () => {
                                mentorgrup.classList.remove("active");
                            });
                        });
                    };
                    body3.addEventListener('click', () => {
                        mentorgrup.classList.remove("active");
                    });
                boxedit.addEventListener("click", mentoredit);
          </script>
@endsection
