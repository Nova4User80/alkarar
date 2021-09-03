<div>
    <div class="m-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Time In
            </label>
            <input wire:model="timeIn"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                type="time">
            <p class="text-red text-xs italic">Please fill out this field.</p>
        </div>
    </div>
    <br>
    <div class="m-mx-3 md:flex mb-6">
        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                Time OUT
            </label>
            <input wire:model="timeOut"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                type="time">
            <p class="text-red text-xs italic">Please fill out this field.</p>
        </div>
    </div>

    <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
 <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded0" wire:click='add'>Add</button>
<br>
        <table class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Department</th>
                    <th class="py-3 px-6 text-left">check</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($emps as $e)
                    <tr>

                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <span class="font-medium">{{ $e->userid }}</span>
                                </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <span class="font-medium">{{ $e->name }}</span>
                                </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <span class="font-medium">{{ $e->dep }}</span>
                                </div>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <input value="{{ $e->userid }}" wire:model="selected" type="checkbox">
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $emps->links() }}
</div>
