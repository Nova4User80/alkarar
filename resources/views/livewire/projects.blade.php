<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <a href="/add_proj"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Project
                </a>
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($projects as $e)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAC4UlEQVRoge2Z30tTYRjHP+/ZpvNilO2qsewiNNkuchwwh6VSSUHlRV1ng+gm6C8wkqKugwqjwiioi+i2IqspZjIL6aK6MiIM0RIy0Eyn294u1oa5nXmO52wrOp+rl/fH836/593znve8AxsbG5tyIooVuL233ZdUhKqgqFJIFVCjkT6f1fM4zQZoG2hzivHK7Q5QJVIFEQBCKfAKQCLNqyyAIQPNvR2eKtfSDlKpgISgRFHFuFQBd1pm0RZUE00Du+4drHYnk0EppSpAlRIV4vUyhZIRKor8dPWgaaByOTGTkWeVzHOxC+sMJV51h7ua8rUoZgSVDrlTq+UfMaCNbaDcmH4PGOFsU9eafc6PXDQU8/9bgefHn+TULSYW+fpjmtHJUe6/f8DMwve8Yws9XT2rkw9LVsDtdLN1Yw1HA0e4frgHn2ezFWF1YcrApdhlrr6+xtOPz0jKJADVVdWcVE9YIk4PppL40djjbHlybopIQycAjf5GhBBIWfyjhmVJ/PbLu2y50lGBp8JjVeiCWGagZsOWbDmeXGJ+ad6q0AUx9ROq89bicrio89bS2XAsWz80/jKbE4Vo9oXZW7Pnj7rMbjQ48YLBiaE1Y5gy0HPoSk7d1NwUN0Zv6ho/PBkDyDGhVzxY+Cb+ubxA/6cBbr25zWx8Vve41SaMiAeTBk49PA3AbHyO6flpUjK15phWfwuQFppheDKGU3H9rtcvHkwaGPv2wVD/Vn8Lrf7d6YkVJ9HP/dm2lYaMUNKzUEY85E/g9VDWw5wVJsp+Gk2klk2NN5wD++4cMDXhSozuOPko6QqsTlqz4qHEX2RmtkstSmoA1r9dalH2JDaLbaBEjGg1aOZA3OXclHu5Sz0mTHeHz1h+fW0oYHNvh6fCsVjnQAQlUpUoqiB9va5nfDTSV14D+Vj5BweSgBQEgTDgXd33rzSQF4lou7t/m5IQISFSIRANQCga6SvdfYuNjY1NSfgFM5rr6hhrpUEAAAAASUVORK5CYII="/>

                                        </div>
                                        <span class="font-medium">{{$e->name}}</span>
                                    </div>
                                </td>


                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <a href="/edit_proj/{{$e->id}}">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        </a>
                                        <a href="/del_proj/{{$e->id}}">
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                        </a>
                                    <!--    <a href="/bulk_proj/{{$e->id}}">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg class="svg-icon" viewBox="0 0 20 20">
                                                    <path d="M16.469,8.924l-2.414,2.413c-0.156,0.156-0.408,0.156-0.564,0c-0.156-0.155-0.156-0.408,0-0.563l2.414-2.414c1.175-1.175,1.175-3.087,0-4.262c-0.57-0.569-1.326-0.883-2.132-0.883s-1.562,0.313-2.132,0.883L9.227,6.511c-1.175,1.175-1.175,3.087,0,4.263c0.288,0.288,0.624,0.511,0.997,0.662c0.204,0.083,0.303,0.315,0.22,0.52c-0.171,0.422-0.643,0.17-0.52,0.22c-0.473-0.191-0.898-0.474-1.262-0.838c-1.487-1.485-1.487-3.904,0-5.391l2.414-2.413c0.72-0.72,1.678-1.117,2.696-1.117s1.976,0.396,2.696,1.117C17.955,5.02,17.955,7.438,16.469,8.924 M10.076,7.825c-0.205-0.083-0.437,0.016-0.52,0.22c-0.083,0.205,0.016,0.437,0.22,0.52c0.374,0.151,0.709,0.374,0.997,0.662c1.176,1.176,1.176,3.088,0,4.263l-2.414,2.413c-0.569,0.569-1.326,0.883-2.131,0.883s-1.562-0.313-2.132-0.883c-1.175-1.175-1.175-3.087,0-4.262L6.51,9.227c0.156-0.155,0.156-0.408,0-0.564c-0.156-0.156-0.408-0.156-0.564,0l-2.414,2.414c-1.487,1.485-1.487,3.904,0,5.391c0.72,0.72,1.678,1.116,2.696,1.116s1.976-0.396,2.696-1.116l2.414-2.413c1.487-1.486,1.487-3.905,0-5.392C10.974,8.298,10.55,8.017,10.076,7.825"></path>
                                                </svg>
                                            </div>
                                            </a> -->
                                    </div>
                                </td>
                            </tr>
                             @endforeach
                        </tbody></table>

                    </div></div></div></div>
