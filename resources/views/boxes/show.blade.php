<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Box') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="text-2xl dark:text-gray-200">
                        Etiqueta: {{ $box->label }}
                    </div>
                    <div class="mt-6 text-gray-500 dark:text-gray-300">
                        Ubicacion: {{ $box->location }}
                    </div>
                </div>

                <!-- Aqui debemos poner una tabla con aquellos items que esten asignados a la caja -->
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="mt-6 text-gray-500 dark:text-gray-300">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="text-left">Nombre</th>
                                    <th class="text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($box->items as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full text-sm text-gray-900 dark:text-gray-100 flex flex-row justify-center items-center gap-2">
                                            <a href="{{ route('items.edit', $item->id) }}" title="Editar Item" class="w-full bg-slate-600 text-center rounded-lg p-2">Editar</a>
                                            <a href="{{ route('items.show', $item->id) }}" title="Editar Item" class="w-full bg-slate-600 text-center rounded-lg p-2">Ver Item</a>
                                            <form action="{{ route('items.delete', $item->id) }}" class="delete-form w-full"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Eliminar Item" id="delete-btn" class="w-full  bg-red-600 text-center rounded-lg p-2"
                                                    type="submit">Eliminar</button>
                                            </form>
                                            @if($item->activeLoan())
                                                <a href="{{ route('loans.show', $item->activeLoan()->id) }}" title="Ver Prestamo" class="w-full bg-yellow-600 text-center rounded-lg p-2">Ver Prestamo</a>
                                            @else
                                                <a href="{{ route('loans.create',$item->id) }}" title="Prestar Item" class="w-full bg-green-600 text-center rounded-lg p-2">Prestar</a>
                                            @endif
                                            
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class=" w-full flex justify-around p-4 gap-3">
                        <a href="{{ route('boxes.edit', $box->id) }}" title="Editar box" class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Editar Caja</a>
                        <!-- boton para volver atras -->
                        <a href="{{ url()->previous() }}" title="Volver" class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Volver</a>
                        <form action="{{ route('boxes.delete', $box->id) }}" class="delete-form w-full"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Eliminar box" id="delete-btn" class="w-full text-white bg-red-600 text-center rounded-lg p-2"
                                                        type="submit">Eliminar Caja</button>
                                                </form>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>