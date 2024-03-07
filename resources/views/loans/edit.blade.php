<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Loan') }}
        </h2>
    </x-slot>

    <div class="w-full mx-auto py-6 flex justify-center items-center">
        <div class="w-full max-w-3xl mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
            <form class="w-full flex flex-col justify-center" action="{{ route('loans.update', $loan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="p-4 w-full">
                    <label for="item_id" class="block font-medium text-white">Item</label>
                    <select name="item_id" id="item_id" class=" w-full p-2 rounded-md">
                        <option value="{{ $item_id->id }}">{{ $item_id->name }}</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-4 w-full">
                    <label for="location" class="block font-medium text-white">Fecha de devolucion esperada</label>
                    <input type="date" name="due_date" id="due_date" class=" w-full p-2 rounded-md" value="{{$loan->due_date}}">
                </div>

                <!-- Submit button -->
                <div class="w-full flex justify-center items-center p-4 gap-2">
                    <a href="{{ route('loans.index') }}" class="w-full cursor-pointer bg-red-600 text-center text-white rounded-md p-2">Cancel</a>
                    <button type="submit" class="w-full cursor-pointer bg-slate-600 text-center text-white rounded-md p-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>