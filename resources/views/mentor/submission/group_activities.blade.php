<h3>Group saat ini: {{ $group->name }} </h3>
<h3>Yuk isi Amalan Yaumiyahmu!!</h3>
<form action="" method="POST">
    {{ csrf_field() }}
    <table border="1">
        @foreach ($group_activities_name as $group_activity)
            <tr>
                <td> {{ $group_activity->name }} </td>
                <td> 
                    <input type="checkbox" name="member_submission[]" value="{{ $group_activity->id }}" 
                    id="{{ $group_activity->id}}" />
                </td>
            </tr>
        @endforeach
        <input name="user_id" value="{{ $user->id }}" type="hidden">
    </table>
    <button type="submit">Submit</button>
    
</form>