<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>

    <div class="w-full flex items-center justify-center">
        <div class="w-full max-w-3xl mx-3 my-8 bg-gray-700 rounded-lg shadow-md overflow-hidden flex items-center justify-center">
            <form class="w-full" action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Form fields for editing item data -->
                <div class="w-full p-4">
                    <div class="w-full mt-1 flex flex-col items-start gap-2 border-2 p-4 border-slate-600 rounded-md">
                        <span class="text-white">Choose how to insert your picture:</span>
                        <div class="w-full">
                            <label for="picture" class="block font-medium text-white">Picture:</label>
                            <div class="w-full flex flex-row justify-center">
                                <input type="file" name="picture" id="picture" class="form-input w-full p-2 rounded-md">
                                <button type="button" id="btn-pic" class="bg-red-600 text-white p-2 rounded-md ml-2 hover:bg-red-800">X</button>
                            </div>
                            
                        </div>
                        <div class="w-full">
                            <label for="url_picture" class="block font-medium text-white">URL Picture:</label>
                            <div class="w-full flex flex-row justify-center">
                                <input type="text" name="url_picture" id="url_picture" placeholder="Picture URL..." class="form-input w-full p-2 rounded-md">
                                <button type="button" id="btn-url" class="bg-red-600 text-white p-2 rounded-md ml-2 hover:bg-red-800">X</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 py-2">
                    <label for="name" class="block font-medium text-white">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name..." class="form-input w-full p-2 rounded-md">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="description" class="block font-medium text-white">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description..." class="form-input w-full p-2 rounded-md">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="price" class="block font-medium text-white">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price..." class="form-input w-full p-2 rounded-md">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="box_id" class="text-white">Box</label>
                            <select name="box_id" id="box_id" class="form-control w-full p-2 rounded-md">
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                </div>

                <!-- Submit button -->
                <div class="w-full flex justify-center items-center p-4 gap-2">
                    <a href="{{ route('items.index') }}" class="w-full cursor-pointer bg-red-600 text-center text-white rounded-md p-2">Cancel</a>
                    <button type="submit" class="w-full cursor-pointer bg-slate-600 text-center text-white rounded-md p-2">Create Item</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/picture.js') }}"></script>
</x-app-layout>