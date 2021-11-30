@extends('main.index')

@section('container')
<style>
  .btn-copy {
    position: relative;
  }
  .btn-copy::before {
    position: absolute;
    content: 'Copy Refeal Code';
    width: max-content;
    height: 20px;
    padding: 1rem;
    color: antiquewhite;
    background: rgb(109, 108, 108);
    font-size: 12px;
    line-height: 1px;  
    border-radius: 3px;
    top: -40px;
    left: -34px;
    opacity: 0;
    transition: all .3s;
  }
  .btn-copy:hover::before {
    opacity: 1;
  }
</style>

  <h6>Share this code to your friend to invite them to this group</h6>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="code" id="code" value="{{ $group->invitation_code }}" disabled>
    <button class="btn-copy btn btn-outline-secondary" type="button" id="copy" onclick="copyToClipboard('code')">Copy</button>
  </div>
  <br>

  @if ($mentors)
    <h4>Other mentor in this group:</h4>
    <ul>
      @foreach ($mentors as $mentor)
        <li>{{ $mentor }}</li>
      @endforeach
    </ul>
  @endif

  @if (count($membersOut))
    <h3>Queue pending member:</h3>
    <ul>
      @foreach ($membersOut as $member)
        <li style="padding: .3rem" class="d-flex justify-content-between border-bottom">
          <h6 style="margin: 0; line-height: 30px;">{{ $member->name }}</h6>
          <div>
            <a href="/accept/{{ $group->id }}/{{ $member->id }}" class="btn btn-success">Accept</a>
            <a href="/reject/{{ $group->id }}/{{ $member->id }}" class="btn btn-danger" onclick="return confirm('Reject the request?')">Reject</a>
          </div>
          </li>
      @endforeach
    </ul>
  @endif

  @if (count($membersIn))
    <h3>Member list of the group <span style="color: rgb(45, 160, 45)">{{ $group->name }}</span>:</h3>  
    <ul>
      @foreach ($membersIn as $member)
        <li>{{ $member->name }}</li>
      @endforeach
    </ul>
  @else
    <br>
    <h3>You do not have member now.</h3>
  @endif

  <br>
  <h6><a href="{{ route("groups") }}">See Groups List</a></h6>
  <br>

  <form action="route('group')" method="post">
    @csrf
    <input type="hidden" name="group_id" value="{{ $group->id }}">
    <button type="submit" class="btn btn-danger" name="delete" value="1" onclick="return confirm('Delete this group?')">Delete this group</button>
  </form>


  <script>
    function copyToClipboard(id) {
      const lastItem = thePath => thePath.substring(thePath.lastIndexOf('/') + 1);
      let code = document.getElementById(id);
      code.select();
      
      navigator.clipboard.writeText(`Join with ${lastItem((window.location.href).replace(/%20/g, " "))}'s group by insert this code in join group section on Yaumi. The code is "${code.value}".`);
    }
  </script>
@endsection