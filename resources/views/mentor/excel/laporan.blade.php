    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th style="text-align: center;background-color:#00A7A0;">Nama</th>
                    <th style="text-align: center;background-color:#00A7A0;">Email</th>
                    <th style="text-align: center;background-color:#00A7A0;">Email at</th>
                    <th style="text-align: center;background-color:#00A7A0;">Avatar</th>
                    <th style="text-align: center;background-color:#00A7A0;">Gender</th>
                    <th style="text-align: center;background-color:#00A7A0;">is_mentor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    {{-- <td>{{ $data->name }}</td>
                    <td>{{ $data->submission->groupActivity->activity->name }}</td>
                    <td>{{ $data->submission->is_done ? "ngerjain" : "gak ngerjain";}}</td>
                    <td>{{ $data->submission->date }}</td>
                    <td>{{ $data->submission->is_haid ? "haid" : "tidak haid"; }}</td> --}}
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->email_verified_at }}</td>
                    <td>{{ $data->avatar }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->is_mentor ? "mentor" : "member" }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
