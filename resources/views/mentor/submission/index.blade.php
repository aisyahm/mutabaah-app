<h3>Group saat ini: {{ $group->name }} </h3>
<form action="{{ route('submission.add') }}" method="POST">
    {{ csrf_field() }}
    <table border="1">
        <tr>
            <td colspan="2"><h4>Sholat Wajib</h4></td>
        </tr>
        @foreach ($wajib as $wajib)
            <tr>
                <td> {{ $wajib->name }} </td>
                <td> 
                    <input type="checkbox" name="group_activity[]" value="{{ $wajib->id }}" 
                    id="{{ $wajib->id}}" />
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><h4>Sholat Rawatib</h4></td>
        </tr>
        @foreach ($rawatib as $rawatib)
            <tr>
                <td> {{ $rawatib->name }} </td>
                <td> 
                    <input type="checkbox" name="group_activity[]" value="{{ $rawatib->id }}" 
                    id="{{ $rawatib->id}}" />
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><h4>Sholat Sunnah</h4></td>
        </tr>
        @foreach ($sunnah as $sunnah)
            <tr>
                <td> {{ $sunnah->name }} </td>
                <td> 
                    <input type="checkbox" name="group_activity[]" value="{{ $sunnah->id }}" 
                    id="{{ $sunnah->id}}" />
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><h4>amalan Sunnah Lainnya</h4></td>
        </tr>
        @foreach ($others as $other)
            <tr>
                <td> {{ $other->name }} </td>
                <td> 
                    <input type="checkbox" name="group_activity[]" value="{{ $other->id }}" 
                    id="{{ $other->id}}" />
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2"><h4>Dzikir</h4></td>
        </tr>
        @foreach ($dzikir as $dzikir)
            <tr>
                <td> {{ $dzikir->name }} </td>
                <td> 
                    <input type="checkbox" name="group_activity[]" value="{{ $dzikir->id }}" 
                    id="{{ $dzikir->id}}" />
                </td>
            </tr>
        @endforeach
        <input name="group_id" value="{{ $group->id }}" type="hidden">
    </table>
    <button type="submit">Submit</button>
    
</form>


