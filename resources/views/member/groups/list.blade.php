@extends('main.index')

@section('container')
  @if (count($groupsIn) || count($groupsOut))
    @if (count($groupsOut))
      <h3>Waiting accept request join group:</h3>
      <ul>
      @foreach ($groupsOut as $groupOut)
        <li>{{ $groupOut->group->name }}</li>     
      @endforeach
      </ul>  
    @endif

    @if (count($groupsIn))
      <h3>Group List:</h3>
      <ul>
      @foreach ($groupsIn as $groupIn)
        <li><a href="/groups/{{ $groupIn->group->name }}">{{ $groupIn->group->name }}</a></li>     
      @endforeach
      </ul>  
    @endif
  @else
    <h3>You has not joined group</h3>  
  @endif

  <br>
  <h6><a href="{{ route("join") }}">Join group</a></h6>
  <br>

  <form action="/logout" method="post">
    @csrf
    <button type="submit">Logout</button>
  </form>
@endsection