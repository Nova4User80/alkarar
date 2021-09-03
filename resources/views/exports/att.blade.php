<table class="min-w-full divide-y divide-gray-200">
    @php
        $days = intval(date('t', strtotime(today())));
        if ($days > $sections) {
            $days = $sections;
        }
    @endphp
    <thead class="bg-gray-50">
        <tr class="text-gray-600 text-left">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="1">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                data-priority="2">Name</th>
            @for ($i = 1; $i <= $days; $i++)
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    data-priority="{{ $i + 2 }}"> {{ $i }}</th>
            @endfor
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Hours
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Days
            </th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Salary
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($emps as $a)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $a->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $a->name }}
                </td>

                @php
                $hours=0;
                $daysCounter=0;
                @endphp

                @for ($i = 1; $i <= $days; $i++)

                    @if ( isset($a->record) || !empty($a->record)

                    ) @php
                        $in = 'X';
                        $out = 'X';
                        if (isset($a->record[intval($year)][intval($month)][intval($i)]['in'])) {
                            $in = $a->record[intval($year)][intval($month)][intval($i)]['in'];
                        }
                        if (isset($a->record[intval($year)][intval($month)][intval($i)]['out'])) {
                            $out = $a->record[intval($year)][intval($month)][intval($i)]['out'];
                        }

                    @endphp
                    <td class="px-6 py-4 whitespace-nowrap">
                    IN <br>
                    {{ $in }}
                    <br />
                    OUT <br>
                    {{ $out }}
                    <br />
                    Hours <br>
                    {{ $in != 'X' && $out != 'X' ? date('h:i, A ', strtotime($out) - strtotime($in)) : 'X' }}
                    </td>
                    @php
                    if($in != 'X' && $out != 'X'){
                        $hours +=round((strtotime($out) - strtotime($in))/3600,1);
                        $daysCounter+=1;
                    }
                @endphp

                @else
                    <td class="px-6 py-4 whitespace-nowrap">X</td> @endif

                @endfor
            <td class="px-6 py-4 whitespace-nowrap">
                @isset($hours)
               {{  $hours}}
                @endisset
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @isset($daysCounter)
               {{  $daysCounter}}
                @endisset
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @isset($daysCounter)
               {{  $daysCounter*$a->salary}}
                @endisset
            </td>
            </tr>

        @endforeach
    </tbody>

</table>
