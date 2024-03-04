@section('page_title')
    {{ 'Items' }}
@endsection

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex gap-4 justify-between mb-8">
                <div class="flex gap-4">
                    <a href="{{ route('items.create') }}"
                        class="flex items-center whitespace-nowrap rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="-ml-1 mr-2 h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        New Item
                    </a>

                    <div class="flex items-center">
                        <input type="checkbox" id="showOnlyAvailable"
                            class="hidden rounded shadow-sm focus:border-0 focus:ring-0 dark:focus:border-0 dark:focus:ring-0">
                    </div>
                </div>

                <!-- Dynamic search -->
                <div
                    class="flex items-center bg-gray-600 rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-3 w-72">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#fff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>


                    <input type="text" name="searchInput" id="searchInput"
                        class="text-sm bg-transparent border-none focus:outline-none focus:ring-0 w-full text-gray-900 dark:text-gray-200 placeholder:text-gray-400"
                        placeholder="Search items">
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full w-full table-item" id="items-table">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Picture') }}
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Nombre') }}
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Caja') }}
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Acciones') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            @if(filter_var($item->picture, FILTER_VALIDATE_URL))
                                                <img src="{{ $item->picture }}" alt="Portada Actual" class="h-20 w-20 mt-2 rounded-md">
                                        <!-- else if si la imagen se carga localmente -->
                                            @elseif($item->picture != null)
                                                <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual" class="h-20 w-20 mt-2 rounded-md">
                                        <!-- sino hay imagen poner un div -->
                                            @else
                                                <div class="flex items-center justify-center h-20 w-20 bg-gray-300 dark:bg-gray-600 rounded-md text-gray-400 dark:text-gray-500 text-xs">
                                                No picture</div>
                                        @endif
                                        </td>
                                        <td id="nombre-item">{{ $item->name }}</td>
                                        <!-- Se debe mostrar el nombre de la caja a la que pertenecen o si no pertenecen a ninguna debe ponerse sin caja -->
                                        <td class="text-center">{{ $item->box ? $item->box->label : 'Sin caja' }}</td>
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
                                            <!-- si active loan una cosa sino otra -->
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
            </div>
        </div>
    </div>

    <script type="module" src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
