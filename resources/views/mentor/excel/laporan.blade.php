    @php
        use App\Models\GroupActivity;
        use App\Models\UserGroup;

        $groupActivity = GroupActivity::where("group_id", 1)->get();
        $nameActivity = [];
        // $user = Auth::user();

        foreach ($groupActivity as $group) {
            $nameActivity[] = $group->activity->name;
        }

        $userGroups = UserGroup::with("group")->where("group_id", 1)->get();
        $user = [];
        foreach ($userGroups as $userGroup) {
            if ($userGroup->is_accept == true && $userGroup->user->is_mentor == false) {
                $user[] = $userGroup->user;
            }
        }
    @endphp    
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
                    <th style="text-align: center;background-color:#00A7A0;">Activity</th>
                    <th style="text-align: center;background-color:#00A7A0;">Is_Done</th>
                    <th style="text-align: center;background-color:#00A7A0;">Date</th>
                    <th style="text-align: center;background-color:#00A7A0;">Is_haid</th>
                    {{-- <th style="text-align: center;background-color:#00A7A0;">is_mentor</th> --}}
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($subDate as $data) --}}
                
                @for ($category = 0; $category < count($subDate); $category++)
                    @for ($date = 0; $date < count($subDate[$category]); $date++)
                      
                        @for ($activity = 0; $activity < count($nameActivity); $activity++)
                            @for ($name = 0; $name < count($user); $name++)
                            <tr>  
                                <td>{{ $user[$name]->name }}</td>
                            </tr>
                            @endfor
                            @php $name = 0; @endphp
                            
                            <td>{{ $nameActivity[$activity] }}</td> 
                        @endfor
                        @php $activtity = 0; @endphp
                        <td>{{ $subDate[$category][$date]->is_done ? "ngerjain" : "gak ngerjain";}}</td>
                        <td>{{ $subDate[$category][$date]->date }}</td>
                        <td>{{ $subDate[$category][$date]->is_haid ? "haid" : "tidak haid"; }}</td>
                    
                    @endfor
                @endfor
            </tbody>
        </table>
    </div>
