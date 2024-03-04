<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-start items-center gap-2 text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Box') }}
            </h2>
            <input class="rounded-sm" type="text" id="searchInput" placeholder="Buscar boxes...">
            <a href="{{ route('boxes.create') }}" class="bg-slate-400 p-2 rounded-sm">Agregar Box</a>
        </div>

    </x-slot>

    <div class="w-full py-12 flex flex-col justify-center">

        <div class="flex flex-col justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full flex flex-col justify-center p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full w-full table-item" id="items-table">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Label') }}
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Location') }}
                                </th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($boxes as $box)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div id="nombre-item" class="text-sm text-gray-900 dark:text-gray-100">
                                            {{ $box->label }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-100">{{ $box->location }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-full text-sm text-gray-900 dark:text-gray-100 flex flex-row justify-center items-center gap-2">
                                            <a href="{{ route('boxes.edit', $box->id) }}" title="Editar Item" class="w-full bg-slate-600 text-center rounded-lg p-2">✒️</a>
                                            <a href="{{ route('boxes.show', $box->id) }}" title="Editar Item" class="w-full bg-slate-600 text-center rounded-lg p-2">🔎</a>
                                            <form action="{{ route('boxes.delete', $box->id) }}" class="delete-form"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button title="Eliminar Item" id="delete-btn" class="w-full  bg-red-600 text-center rounded-lg p-2"
                                                    type="submit">🗑️</button>
                                            </form>
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

    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
