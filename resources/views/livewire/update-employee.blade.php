<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Employee') }}
        </h2>
    </x-slot>
    <form wire:submit.prevent="edit">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="m-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-first-name">
                        ID
                    </label>
                    <input wire:model="eid"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="grid-first-name" type="text" placeholder="Jane">
                    <p class="text-red text-xs italic">Please fill out this field.</p>
                </div>
            </div>
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                    Salary per day
                </label>
                <div class="relative">
                    <input wire:model="salary"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="grid-first-name" type="number" placeholder="12.5">
                </div>
            </div>
            <div class="m-mx-3 md:flex mb-6">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                        for="grid-first-name">
                        Name
                    </label>
                    <input wire:model="name"
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"
                        id="grid-first-name" type="text" placeholder="Jane">
                    <p class="text-red text-xs italic">Please fill out this field.</p>
                </div>
            </div>


            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                    Tags
                </label>
                <div class="relative">
                    <select wire:model="selectTags" multiple>
                        @foreach ($pres as $p)
                            <option value="{{ $p->name }}" selected>{{ $p->name }}</option>
                        @endforeach
                        @foreach ($tags as $t)
                            <option value="{{ $t->name }}">{{ $t->name }} </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <br>


            <div class="relative">

                @foreach ($proj as $p)
                    <label>{{ $p->name }}</label>
                    <input type="text" class="border" wire:model="selectProj.{{ $p->id }}" />
                    <br>
                    <br>
                @endforeach

            </div>

            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
