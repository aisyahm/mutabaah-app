<?php use App\Models\Activity; ?>

<h3>Group saat ini: {{ $group->name }} </h3>
<h3>Yuk isi Amalan Yaumiyahmu!!</h3>
<form action="{{ route('submission.submit') }}" method="POST">
    {{ csrf_field() }}
    <table border="1">
        @foreach ($group_activities_name as $key => $group_activity)
            <tr>
                <td> {{ $group_activity }} </td>
                <td> 
                    <input type="checkbox" name="member_submission[]" value="{{ $key }}" 
                    id="{{ $key }}" />
                </td>
            </tr>
        @endforeach
        <input name="user_id" value="{{ $user->id }}" type="hidden">
    </table>
    <br>
    <button type="submit">Submit</button>
    
</form>