@extends('main.index')

@section('container')
    
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <main class="form-signin">
        <h1 class="h3 mb-3 fw-normal text-center">Join Group</h1>
        <form action="{{ route("join") }}" method="POST">
          @csrf
          <div class="form-floating">
            <input type="text" name="code" class="form-control" id="code" autofocus value="{{ old("code") }}" autocomplete="off" required >
            <label for="code">Invitation Code</label>
          </div>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Join Group</button>
          <br><br>

          @if (session()->has("group"))
            @if (!session("group"))
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <h6 style="text-align: center; width: 100%; margin-bottom: 0;">Invitation code tidak valid!</h6>
              </div>
            @endif
          @endif

          @if (session()->has("pending"))
            @if (session("pending"))
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <h6 style="text-align: center; width: 100%; margin-bottom: 0;">You has request to join this group before.</h6>
              </div>
            @else
              <div class="alert alert-danger d-flex align-items-center" role="alert">
                <h6 style="text-align: center; width: 100%; margin-bottom: 0;">You has joined this group.</h6>
              </div>
            @endif
          @endif
        </form>

        <h6><a href="{{ route("groups") }}">See group list</a></h6>

        <br>
        <form action="/logout" method="post">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </main>
    </div>
  </div>
  
  @endsection