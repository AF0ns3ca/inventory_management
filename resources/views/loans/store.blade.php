<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('loan') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4">
                    <label for="item_id" class="block font-medium text-white">Item</label>
                    {{-- Select con todos los items y que este seleccionado aquel que coincida con el que tenemos
                         --}}
                    <select name="item_id" id="item_id" class="form-input">
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="p-4">
                    <label for="location" class="block font-medium text-white">Fecha de devolucion esperada</label>
                    <input type="date" name="due_date" id="due_date" class="form-input">
                </div>

                <!-- Submit button -->
                <div class="flex justify-end p-4">
                    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="ml-2 btn btn-primary">Crear Prestamo</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>