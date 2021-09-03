<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Operations') }}
        </h2>
        <br>
        <hr>
        <br>

        <br>
    </x-slot>




    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <div >
                <div>
                    <p>
                        Upload Attendance based on project
                    </p>
                <div class="relative">
                    <select wire:model="selectProject">
                        @foreach ($projects as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="col-span-2">
                    <form wire:submit.prevent="ua">
                        <input hint="Excel Attendance File" type="file" wire:model="attFile">
                        <input hint="close alerts?" type="checkbox" wire:model='closeAlerts'>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload
                            Attendance</button>
                    </form>
                </div>
            </div>
            <br>
            <hr>
            <br>
                <div class="col-span-2">
                    <p>
                        Upload New Employees
                    </p>
                    <form wire:submit.prevent="ea">
                        <input hint="Excel Employee File" type="file" wire:model="empFile">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload
                            Employee</button>
                    </form>
                </div>
                <br>
                <div class="col-span-2">
                    <p>
                        Upload New Employees with Sync
                    </p>
                    <form wire:submit.prevent="addWithIDs">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload
                            Employee</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
</div>
