@extends('main.index')

@section('container')
    
<div class="row justify-content-center">
  <div class="col-lg-6">
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Create Group</h1>
      <form action="{{ route("create") }}" method="POST">
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control" id="name" autofocus value="{{ old("name") }}" autocomplete="off" required >
          <label for="name">Group name</label>
        </div>
        {{-- <div class="form-floating">
          <input type="text" name="code" class="form-control" id="code" autofocus value="{{ old("code") }}" autocomplete="off" required >
          <label for="code">Invitation Code</label>
        </div> --}}
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Create New Group</button>
        <br><br>

        @if (session()->has("existTeam") || session()->has("existCode"))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
              <h6 style="text-align: center; width: 100%; margin-bottom: 0;">This name has already exist in group list</h6>
            </div>
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