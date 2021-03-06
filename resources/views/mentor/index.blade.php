@extends("mentor.template")

@section('content')
  @php
    use App\Models\UserGroup;
    use Illuminate\Support\Facades\Auth;

    $groups = UserGroup::with("group")->where("user_id", Auth::user()->id)->get();
    $groupsIn = [];
    $membersIn = [];

    $groups = $groups->where("is_accept", true);
    foreach ($groups as $group) {
      $groupsIn[] = $group->group;
      $membersIn[] = $group->where("group_id", $group->group->id)->where("is_accept", true)->count() - 1;
    }
  @endphp
  
  <div class="home-container">
      <img src="./assets/img/no-group.svg" class="no-group" />
      <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
    @if (!$groupsIn)  
      <h4>
        Saat ini kamu belum memiliki grup. Silahkan membuat grup untuk mulai
        mencatat amalan bersama sahabat sampai surgamu!
      </h4>
      <button class="new-group-btn">Buat grup baru</button>
    @else
      <h4>
        Ayo ajak lingkungan kamu untuk berlomba dalam kebaikan!
      </h4>    
    @endif
  </div>
@endsection