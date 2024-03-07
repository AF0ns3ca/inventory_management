<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Box') }}
        </h2>
    </x-slot>

    <div class="w-full flex items-center justify-center">
        <div class="w-full max-w-3xl mx-3 my-8 bg-gray-700 rounded-lg shadow-md overflow-hidden flex items-center justify-center">
            <form class="w-full" action="{{ route('boxes.update', $box->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="w-full px-4 py-2">
                    <label for="label" class="block font-medium text-white">Label</label>
                    <input type="text" name="label" id="label" placeholder="Label..." class="form-input w-full p-2 rounded-md" value="{{$box->label}}">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="location" class="block font-medium text-white">Location</label>
                    <input type="text" name="location" id="location" placeholder="Location..." class="form-input w-full p-2 rounded-md" value="{{$box->location}}">
                </div>

                <!-- Submit button -->
                <div class="w-full flex justify-center items-center p-4 gap-2">
                    <a href="{{ route('boxes.index') }}" class="w-full cursor-pointer bg-red-600 text-center text-white rounded-md p-2">Cancel</a>
                    <button type="submit" class="w-full cursor-pointer bg-slate-600 text-center text-white rounded-md p-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>