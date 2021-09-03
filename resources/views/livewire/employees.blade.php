<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>




    <div class="overflow-x-auto">

        <div
            class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <br>
                <a href="/add_employees" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New Employee
                </a>

                <div class="bg-white shadow-md rounded my-6">
                    <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Name</th>
                                <th class="py-3 px-6 text-left">Salary</th>
                                <th class="py-3 px-6 text-center">Tags</th>
                                <th class="py-3 px-6 text-center">Projects</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($employees as $e)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <span class="font-medium">{{ $e->userid }}</span>
                                            </div>
                                    </td>

                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABmJLR0QA/wD/AP+gvaeTAAACZ0lEQVRYhe2Wv2tTURTHP/e9l6QtTdO0JSBEI1mk0C5SikXQDhZBBBEcKpjNwUlw8W8QBwcnhyJYEZeCuIiggwhaUgtdpKWDAX9kEdJEUzGJefc6xEKTpnnpvTE+Id/xnve+5/POeedwwecSpgYX7qw8KlfkvEJZ9cZChkLW46c3pq+Y+DtmeFCuyPm7V6esgFPHx6+qtK4vrF4GOg947nb6PIJF15VRLwOFohEOIOBYKJR19tay8vKwbWtLKpV6fvPEs7YAETw4efxYdDQS9vLmycuVlvGLZ6Y9PXKF4sjbtc1FYKwxtvfTAdeVI+3AdUqjw2GqrhxtFmsK6CcZDcnrdxsAXLuX3v+Z1Q1OTY1r5zCroPGS8pZRBU0q0658/w/2AE3VAzSV8WUBYDAIM3HB4aHa3skWFemsolAy9zYGHAzCpXGL0C6no8OCQ2HB0rpku2Lmb9zimbiog9tRyK7FTGUMuNPWZoq3iLUr3w+JMWC2uP999PN3z7uqp4wB01lF2d17XqrC8hcfABZKsLQuyeQVFRcqLnzIK5Y2JD8MJxg6tAe3K/AiowDzijXK90NiXMF+ByZigkREEOmrnRVK8Omb4v1Xxc/qPwRMRgWzCUHArj8fG4CxAcFkTPDqoyKT12+9douTUcFcci/cbgVsmEsKklH9ha0F2O/AbKL9pKcTgj7NXmkBTsRaV65RQRsmY3pV1AJMDB882ZFIFwGHQgd/J6LxDmhO8f01qZdNQ75f1D1AU/2fgLZtbeUKxa5B5ApFHNvKNYs1nWKpVOrN2uZD15UjfxftD4Rt5aQrU93I1XH9BpH3oY95YRUdAAAAAElFTkSuQmCC" />
                                            </div>
                                            <span class="font-medium">{{ $e->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <span class="font-medium">{{ $e->salary }}</span>
                                            </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @isset($e->tags)
                                        @foreach ($e->tags as $t)
                                            <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">
                                                {{ $t['name'] }}
                                            </span>
                                        @endforeach
                                        @endisset


                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @isset($e->projects)
                                        @foreach ($e->projects as $p)
                                            <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">
                                                {{ $p->name }}
                                            </span>
                                        @endforeach
                                        @endisset
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="/show_att/{{ $e->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="/edit_employee/{{ $e->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="/del_employee/{{ $e->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="/add_att/{{ $e->id }}">
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <svg class="svg-icon" viewBox="0 0 20 20">
                                                        <path
                                                            d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
