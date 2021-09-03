<div class="container flex mx-auto w-full items-center justify-center">
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

    <div
        class="container flex flex-col mx-auto w-full items-center justify-center bg-white dark:bg-gray-800 rounded-lg shadow">
        <ul class="flex flex-col divide divide-y">
            @forelse ($atts as $key=>$val)

                <li class="flex flex-row">
                    <div class="select-none cursor-pointer flex flex-1 items-center p-4">
                        <div class="flex-1 pl-1 mr-16">
                            <div class="font-medium dark:text-white">
                                {{ $val['in']??'X' }}
                            </div>
                            <div class="text-gray-600 dark:text-gray-200 text-sm">
                                {{ $val['out']??'X' }}
                            </div>
                        </div>
                        <div class="text-gray-600 dark:text-gray-200 text-xs">
                           {{$key}}
                        </div>
                    </div>
                </li>
                @empty
                <p>No Data</p>
            @endforelse
        </ul>
    </div>


</div>
