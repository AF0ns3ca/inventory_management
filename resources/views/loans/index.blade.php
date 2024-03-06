<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-start items-center gap-2 text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Loan') }}
            </h2>
        </div>

    </x-slot>

    <div class="w-full py-12 flex flex-col justify-center">

        <div class="flex flex-col justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full flex flex-col justify-center p-6 text-gray-900 dark:text-gray-100">
                    {{-- Si loans no esta vacio hay que poner la tabla --}}
                    @if (count($loans) !== 0)
                        <table class="min-w-full w-full table-item" id="items-table">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Usuario') }}
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Item') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Fecha de Creacion') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Fecha de Devolucion') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Fecha de Retorno') }}
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-center text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">
                                        {{ __('Acciones') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div id="nombre-usuario" class="text-sm text-gray-900 dark:text-gray-100">
                                                {{ $loan->user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div id="nombre-item" class="text-sm text-gray-900 dark:text-gray-100">
                                                {{-- ponemos el nombre del item correspondiente al item_id --}}
                                                {{ $loan->item->name }}

                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                                {{ $loan->checkout_date }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ $loan->due_date }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{-- Si hay returned date lo pone sino poner no devuelto --}}
                                            <div class="text-sm text-gray-900 dark:text-gray-100">
                                                @if ($loan->returned_date)
                                                    {{ $loan->returned_date }}
                                                @else
                                                    No devuelto
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div>
                                                {{-- Un botón que aparezca si no hay fecha de retorno, si la hay poner préstamo completo --}}
                                                @if (!$loan->returned_date)
                                                    {{-- Mostrar el botón si no hay fecha de retorno --}}
                                                    @if ($loan->user_id == Auth::id())
                                                        <a class="bg-gray-600 text-white p-2 rounded-md hover:bg-gray-700"
                                                            href="{{ route('loans.edit', $loan->id) }}"
                                                            class="btn btn-primary">Completar Prestamo</a>
                                                    @else
                                                        <div class="text-sm text-gray-900 dark:text-gray-100">
                                                            Prestado a {{ $loan->user->name }}
                                                        </div>
                                                    @endif
                                                @else
                                                    {{-- Mostrar "Préstamo completo" si hay una fecha de retorno --}}
                                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                                        Préstamo completo
                                                    </div>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>NO HAY PRESTAMOS</div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
