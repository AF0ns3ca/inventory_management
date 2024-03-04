<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('box') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Form fields for editing item data -->
                <div class="p-4">
                    <label for="picture" class="block font-medium text-white">Picture</label>
                    <div class="mt-1 flex items-center">
                        <input type="file" name="picture" id="picture" class="form-input">
                        <input type="text" name="url_picture" id="url_picture" placeholder="Introduce URL de la portada..." class="ml-2 form-input">
                    </div>
                </div>
                <div class="p-4">
                    <label for="name" class="block font-medium text-white">Name</label>
                    <input type="text" name="name" id="name" class="form-input">
                </div>
                <div class="p-4">
                    <label for="description" class="block font-medium text-white">Description</label>
                    <input type="text" name="description" id="description" class="form-input">
                </div>
                <div class="p-4">
                    <label for="price" class="block font-medium text-white">Price</label>
                    <input type="number" name="price" id="price" class="form-input">
                </div>
                <div class="p-4">
                <label for="box_id">Box</label>
                            <select name="box_id" id="box_id" class="form-control">
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                </div>

                <!-- Submit button -->
                <div class="flex justify-end p-4">
                    <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="ml-2 btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>