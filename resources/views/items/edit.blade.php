<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Item') }}
        </h2>
    </x-slot>

    <div class="w-full flex items-center justify-center">
        <div class="w-full max-w-3xl mx-3 my-8 bg-gray-700 rounded-lg shadow-md overflow-hidden flex items-center justify-center">
        <form class="w-full" action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Form fields for editing item data -->
                <div class="w-full p-4 flex flex-row gap-3">
                    <div class="w-[70%] mt-1 flex flex-col items-start gap-2 border-2 p-4 border-slate-600 rounded-md">
                        <span class="text-white">Choose how to insert your picture:</span>
                        <div class="w-full">
                            <label for="picture" class="block font-medium text-white">Picture:</label>
                            <input type="file" name="picture" id="picture" class="form-input w-full p-2 rounded-md">
                        </div>
                        <div class="w-full">
                            <label for="url_picture" class="block font-medium text-white">URL Picture:</label>
                            <input type="text" name="url_picture" id="url_picture" placeholder="Picture URL..." class="form-input w-full p-2 rounded-md">
                        </div>
                    </div>
                    <div class="w-[30%] mt-1 flex items-center">
                        @if(filter_var($item->picture, FILTER_VALIDATE_URL))
                            <div class="flex items-center justify-center h-full w-full rounded-md">
                                <img src="{{ $item->picture }}" alt="Portada Actual" class="w-full h-full rounded-md">
                            </div>
                            <!-- else if si la imagen se carga localmente -->
                        @elseif($item->picture != null)
                            <div class="flex items-center justify-center h-full w-full rounded-md">
                                <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual" class="w-full h-full rounded-md">
                            </div>
                            <!-- sino hay imagen poner un div -->
                        @else
                            <div class="flex items-center justify-center h-full w-full bg-gray-300 dark:bg-gray-600 rounded-md text-gray-400 dark:text-gray-500 text-xl">
                                <span class="text-center">{{$item->name}}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-full px-4 py-2">
                    <label for="name" class="block font-medium text-white">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name..." class="form-input w-full p-2 rounded-md" value="{{$item->name}}">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="description" class="block font-medium text-white">Description</label>
                    <input type="text" name="description" id="description" placeholder="Description..." class="form-input w-full p-2 rounded-md"value="{{$item->description}}">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="price" class="block font-medium text-white">Price</label>
                    <input type="number" name="price" id="price" placeholder="Price..." class="form-input w-full p-2 rounded-md" value="{{$item->price}}">
                </div>
                <div class="w-full px-4 py-2">
                    <label for="box_id" class="block font-medium text-white">Box</label>
                    <select name="box_id" id="box_id" class="form-control w-full p-2 rounded-md">
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
                <div class="w-full flex justify-center items-center p-4 gap-2">
                    <a href="{{ route('items.index') }}" class="w-full cursor-pointer bg-red-600 text-center text-white rounded-md p-2">Cancel</a>
                    <button type="submit" class="w-full cursor-pointer bg-slate-600 text-center text-white rounded-md p-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>