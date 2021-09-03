<div>
    <div>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('New Attendance') }}
            </h2>
        </x-slot>
      <form wire:submit.prevent="add">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
        <div class="m-mx-3 md:flex mb-6">
          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
               Date
            </label>
            <input wire:model="date" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" type="date" >
            <p class="text-red text-xs italic">Please fill out this field.</p>
          </div>
        </div>
        <br>
        <div class="m-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Time In
              </label>
              <input wire:model="timeIn" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" type="time" >
               <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>
          </div>
          <br>
          <div class="m-mx-3 md:flex mb-6">
            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                 Time OUT
              </label>
              <input wire:model="timeOut" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" type="time" >
               <p class="text-red text-xs italic">Please fill out this field.</p>
            </div>
          </div>
          <br>

        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add
          </button>
        </div>
      </div>
      </form>
    </div>

</div>
