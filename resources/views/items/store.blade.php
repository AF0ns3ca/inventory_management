<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

        <div class="container w-full">
            <div class="row">
                <div class="col-md-8 offset-md-2 flex flex-row">
                    <form action="{{ route('items.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Form fields for editing item data -->
                        <div class="form-group mb-3">
                            <label for="picture">Picture</label>
                            <input type="file" name="picture" id="picture" class="form-control">
                            <input type="text" name="url_picture" id="url_picture"
                                        placeholder="Introduce URL de la portada...">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        {{-- hacer un select que ponga los elementos boxes que haya en la base de datos --}}
                        <div class="form-group
                        mb-3">
                            <label for="box_id">Box</label>
                            <select name="box_id" id="box_id" class="form-control">
                                @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        

                        <!-- Submit button -->
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>

                        

                        <button class="bg-slate-100" type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>

    
</x-app-layout>