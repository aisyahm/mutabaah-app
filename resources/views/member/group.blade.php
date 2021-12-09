@extends('member.template')

@section('content')
  <h4>Mentor in this group:</h4>
  <ul>
    @foreach ($mentors as $mentor)
        <li>{{ $mentor }}</li>
    @endforeach
  </ul>
  <br>

  <h3>Member list of the group <span style="color: rgb(45, 160, 45)">{{ $group->name }}</span>:</h3>  
  <ul>
    @foreach ($membersIn as $member)
      <li>{{ $member->name }}</li>
    @endforeach
  </ul>

  <br>
  <h6><a href="{{ route("home") }}">See Groups List</a></h6>
  <br>

  <form action="{{ route("delete") }}" method="post">
    @csrf
    <input type="hidden" name="group_id" value="{{ $group->id }}">
    <button type="submit" class="btn btn-danger" name="leave" value="1" onclick="return confirm('Leave this group?')">Leave this group</button>
  </form>
@endsection