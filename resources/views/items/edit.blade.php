<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('box') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Form fields for editing item data -->
                <div class="p-4">
                    <label for="picture" class="block font-medium text-white">Picture</label>
                    <div class="mt-1 flex items-center">
                        <input type="file" name="picture" id="picture" class="form-input">
                        <input type="text" name="url_picture" id="url_picture" placeholder="Introduce URL de la portada..." class="ml-2 form-input">
                    </div>
                    <!-- Si la imagen es una URL -->
                    @if(filter_var($item->picture, FILTER_VALIDATE_URL))
                    <img src="{{ $item->picture }}" alt="Portada Actual" class="w-[100px] h-[100px] mt-2">
                    <!-- else if si la imagen se carga localmente -->
                    @elseif($item->picture != null)
                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual" class="w-[100px] h-[100px] mt-2">
                    <!-- sino hay imagen poner un div -->
                    @else
                    <div class="flex items-center justify-center h-20 w-20 bg-gray-300 dark:bg-gray-600 rounded-md text-gray-400 dark:text-gray-500 text-xs">
                        No picture</div>
                    @endif
                </div>
                <div class="p-4">
                    <label for="name" class="block font-medium text-white">Name</label>
                    <input type="text" name="name" id="name" class="form-input" value="{{ $item->name }}">
                </div>
                <div class="p-4">
                    <label for="description" class="block font-medium text-white">Description</label>
                    <input type="text" name="description" id="description" class="form-input" value="{{ $item->description }}">
                </div>
                <div class="p-4">
                    <label for="price" class="block font-medium text-white">Price</label>
                    <input type="text" name="price" id="price" class="form-input" value="{{ $item->price }}">
                </div>
                <div class="p-4">
                    <label for="box_id" class="block font-medium text-white">Box</label>
                    <select name="box_id" id="box_id" class="form-select">
                        <!-- Hacemos un desplegable con las boxes, si no tiene box, añadir una opcion por defecto que sea Sin Caja -->
                        @if($item->box_id == null)
                            <option value="" selected>Sin Caja</option>
                        @else
                            <option value="">Sin Caja</option>
                        @endif
                        @foreach ($boxes as $box)
                            @if($item->box_id == $box->id)
                                <option value="{{ $box->id }}" selected>{{ $box->label }}</option>
                            @else
                                <option value="{{ $box->id }}">{{ $box->label }}</option>
                            @endif
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