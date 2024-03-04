<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('box') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('boxes.update', $box->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-4">
                    <label for="label" class="block font-medium text-white">Label</label>
                    <input type="text" name="label" id="label" class="form-input">
                </div>
                <div class="p-4">
                    <label for="location" class="block font-medium text-white">Location</label>
                    <input type="text" name="location" id="location" class="form-input">
                </div>

                <!-- Submit button -->
                <div class="flex justify-end p-4">
                    <a href="{{ route('boxes.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="ml-2 btn btn-primary">Crear Caja</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>