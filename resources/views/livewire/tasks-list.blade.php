<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actions') }}
        </h2>
    </x-slot>




    <div class="overflow-x-auto">

        <div
            class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <br>


                <div class="bg-white shadow-md rounded my-6">
                
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">by</th>
                                <th class="py-3 px-6 text-left">action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tasks as $t)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <span class="font-medium">{{ $t->id }}</span>
                                            </div>
                                    </td>

                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABmJLR0QA/wD/AP+gvaeTAAACZ0lEQVRYhe2Wv2tTURTHP/e9l6QtTdO0JSBEI1mk0C5SikXQDhZBBBEcKpjNwUlw8W8QBwcnhyJYEZeCuIiggwhaUgtdpKWDAX9kEdJEUzGJefc6xEKTpnnpvTE+Id/xnve+5/POeedwwecSpgYX7qw8KlfkvEJZ9cZChkLW46c3pq+Y+DtmeFCuyPm7V6esgFPHx6+qtK4vrF4GOg947nb6PIJF15VRLwOFohEOIOBYKJR19tay8vKwbWtLKpV6fvPEs7YAETw4efxYdDQS9vLmycuVlvGLZ6Y9PXKF4sjbtc1FYKwxtvfTAdeVI+3AdUqjw2GqrhxtFmsK6CcZDcnrdxsAXLuX3v+Z1Q1OTY1r5zCroPGS8pZRBU0q0658/w/2AE3VAzSV8WUBYDAIM3HB4aHa3skWFemsolAy9zYGHAzCpXGL0C6no8OCQ2HB0rpku2Lmb9zimbiog9tRyK7FTGUMuNPWZoq3iLUr3w+JMWC2uP999PN3z7uqp4wB01lF2d17XqrC8hcfABZKsLQuyeQVFRcqLnzIK5Y2JD8MJxg6tAe3K/AiowDzijXK90NiXMF+ByZigkREEOmrnRVK8Omb4v1Xxc/qPwRMRgWzCUHArj8fG4CxAcFkTPDqoyKT12+9douTUcFcci/cbgVsmEsKklH9ha0F2O/AbKL9pKcTgj7NXmkBTsRaV65RQRsmY3pV1AJMDB882ZFIFwGHQgd/J6LxDmhO8f01qZdNQ75f1D1AU/2fgLZtbeUKxa5B5ApFHNvKNYs1nWKpVOrN2uZD15UjfxftD4Rt5aQrU93I1XH9BpH3oY95YRUdAAAAAElFTkSuQmCC" />
                                            </div>
                                            <span class="font-medium">{{ $t->by }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <span class="font-medium">{{ $t->action }}</span>
                                            </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
