<h3>Group saat ini: {{ $group->name }} </h3>
<form action="{{ route('submission.add') }}" method="POST">
    {{ csrf_field() }}
    <table border="1">
        @foreach ($activities as $activity)
            <tr>
                <td> {{ $activity->name }} </td>
                <td> 
                    <input type="checkbox"
                    name="group_activity[]"
                    value="{{ $activity->id }}" 
                    id="{{ $activity->id}}" />
                </td>
            </tr>
        @endforeach
        <input name="group_id" value="{{ $group->id }}" type="hidden">
    </table>
    <button type="submit">Submit</button>
    
</form>


