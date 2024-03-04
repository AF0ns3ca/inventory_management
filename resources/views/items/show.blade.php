<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6">
        <div class="mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden">
            <div class="p-4">
                <p>Nombre: {{$item -> name}}</p>
                <p>Descripción: {{$item -> description}}</p>
                <p>Precio: {{$item -> price}}€</p>
            <!-- con la caja que tiene asignada, coger el nombre de la caja -->
            <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- hacer que si tiene ide salga el label del box --}}
                                        @if ($item->box_id != null)
                                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                                Caja: {{ $item->box->label }}</div>
                                        @else
                                            <div class="text-sm text-gray-900 dark:text-gray-100">Sin caja</div>
                                        @endif
                                    </td>
                @if(filter_var($item->picture, FILTER_VALIDATE_URL))
                <img src="{{ $item->picture }}" alt="Portada Actual" class="w-[100px] h-[100px] mt-2">
                @else
                <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual" class="w-[100px] h-[100px] mt-2">
                @endif
            <div class=" w-full flex justify-around p-4 gap-3">
                    <a href="{{ route('items.edit', $item->id) }}" title="Editar Item" class="w-full bg-slate-600 text-center rounded-lg p-2">✒️</a>
                    <!-- boton para volver atras -->
                    <a href="{{ route('items.index') }}" title="Volver" class="w-full bg-slate-600 text-center rounded-lg p-2">🔙</a>
                    <form action="{{ route('items.delete', $item->id) }}" class="delete-form w-full"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Eliminar Item" id="delete-btn" class="w-full  bg-red-600 text-center rounded-lg p-2"
                                                        type="submit">🗑️</button>
                                                </form>
            </div>
        </div>
    </div>
</x-app-layout>