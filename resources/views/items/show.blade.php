<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-7xl container mx-auto py-6 flex">
        <div class="w-full max-w-7xl mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
                <div class="w-full max-w-7xl p-4 flex flex-col">
                <div class="w-full max-w-7xl flex flex-row justify-around">
                    <div class="p-4">
                        <div>Nombre: {{ $item->name }}</div>
                        <div>Descripción: {{ $item->description }}</div>
                        <div>Precio: {{ $item->price }}€</div>
                        <div>
                            @if ($item->box_id != null)
                                <div class="text-sm text-gray-900 dark:text-gray-100">
                                    Caja: {{ $item->box->label }}</div>
                            @else
                                <div class="text-sm text-gray-900 dark:text-gray-100">Sin caja</div>
                            @endif
                        </div>

                    </div>
                    <div class="p-4">
                        <div class="flex flex-col gap-3">
                            <div>
                                @if (filter_var($item->picture, FILTER_VALIDATE_URL))
                                    <img src="{{ $item->picture }}" alt="Portada Actual"
                                        class="w-[100px] h-[100px] mt-2">
                                @else
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual"
                                        class="w-[100px] h-[100px] mt-2">
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

                <div class=" w-full flex flex-row justify-around p-4 gap-3">
                    <a href="{{ route('items.edit', $item->id) }}" title="Editar Item"
                        class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Editar</a>
                    <!-- boton para volver atras -->
                    <a href="{{ route('items.index') }}" title="Volver"
                        class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Volver</a>
                    <form action="{{ route('items.delete', $item->id) }}" class="delete-form w-full" method="post">
                        @csrf
                        @method('DELETE')
                        <button title="Eliminar Item" id="delete-btn"
                            class="w-full  bg-red-600 text-center text-white rounded-lg p-2"
                            type="submit">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
