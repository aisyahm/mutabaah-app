@extends('main.index')

@section('container')

  @if (count($groupsIn))
    <h3>Group List:</h3>
    <ul>
    @foreach ($groupsIn as $groupIn)
      <li><a href="/groups/{{ $groupIn->group->name }}">{{ $groupIn->group->name }}</a></li>     
    @endforeach
    </ul>  

  @else
    <h3>You have not created a group yet</h3>
  @endif

  <br>
  <h6><a href="{{ route("create") }}">Create group</a></h6>
  <br>
  
  <form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
  </form>
@endsection