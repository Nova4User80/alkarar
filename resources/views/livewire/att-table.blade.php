<div>




    <!--Container-->
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

        <!--Title-->
        <h1 class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl">
            Attendance {{ intval($year) . '/' . intval($month) }}
        </h1>

        <!-- component -->
        <!--   <div class="flex flex-col bg-white m-auto p-auto">
            <h1 class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-gray-800">
                Tags
            </h1>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                <div class="flex flex-nowrap lg:ml-40 md:ml-20 ml-10 ">
                    @foreach ($tags as $t)
                    <div class="inline-block px-3">
                        <div
                            class="w-auto h-auto max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                            <input type="checkbox" value="{{ $t->userid }}"  wire:model="selectedTags">
                            <span class="ml-2">{{ $t->name }}</span>
                        </div>
                    </div>
                    @endforeach
                 </div>
            </div>
        </div> -->

        <!--Card-->
        <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />

        <div id='recipients' class="p-8 mt-10 lg:mt-0 rounded shadow bg-white">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select class="form-control select-scrollable "  wire:model="selectedTags" multiple>
                            @foreach ($tags as $t)

                                    <option>{{ $t->name }}</option>

                            @endforeach
                        </select>
                        <br>
                        <select wire:model="year">
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                        <select wire:model="month">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        Show: <input class="border-indigo-500  rounded-none rounded-r-md sm:text-sm border-gray-300 "
                            wire:model="sections">
                    </div>
                </div>
            </div>
            <button
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                wire:click="export">Export Excel File</button>
            <button
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                wire:click="todayAtt"> Today Attendance </button>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hours
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Days
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Salary
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($emps as $a)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $a->userid }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $a->name }}
                                            </td>

                                            @php
                                                $hours = 0;
                                                $daysCounter = 0;
                                            @endphp

                                            @for ($i = 1; $i <= $days; $i++)

                                                @if (isset($a->record) || !empty($a->record)) @php
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
                                                    if ($in != 'X' && $out != 'X') {
                                                        $hours += round((strtotime($out) - strtotime($in)) / 3600, 1);
                                                        $daysCounter += 1;
                                                    }
                                                @endphp

                                            @else
                                                <td class="px-6 py-4 whitespace-nowrap">X</td> @endif

                                            @endfor
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($hours)
                                                    {{ $hours }}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($daysCounter)
                                                    {{ $daysCounter }}
                                                @endisset
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @isset($daysCounter)
                                                    {{ $daysCounter * $a->salary }}
                                                @endisset
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div> {{ $emps->links() }}
                </div>
            </div>


        </div>

        <!--/Card-->


    </div>
    <!--/container-->







</div>
