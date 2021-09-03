<div class="w-full max-w-screen-xl mx-auto px-6">
    <div class="flex justify-center p-4 px-3 py-10">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg px-3 py-2 mb-4">
                <div class="block text-gray-700 text-lg font-semibold py-2 px-2">
                   Bending To Approve
                </div>

                <div class="py-3 text-sm">
                    @foreach ($users as $e)
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="flex-grow font-medium px-2">{{$e->name}}</div>
                        <div class="flex-grow font-medium px-2">{{$e->email}}</div>
                        <div class="text-sm font-normal text-gray-500 tracking-wide">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click='approve({{$e->id}})'>
                                Approve</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click='delete({{$e->id}})'>
                                    Delete</button>
                            </div>
                    </div>
                    @endforeach


            </div>
        </div>
    </div>
</div>
