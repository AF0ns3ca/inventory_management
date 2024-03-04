<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-start items-center gap-2 text-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Loan') }}
            </h2>
            <input class="rounded-sm" type="text" id="searchInput" placeholder="Buscar boxes...">
        </div>

    </x-slot>

    <div class="w-full py-12 flex flex-col justify-center">

        <div class="flex flex-col justify-center max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full flex flex-col justify-center p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-item w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Usuario') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Item') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Fecha de creacion') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Fecha de devolucion') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Fecha de retorno') }}
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    {{ __('Acciones') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($loans as $loan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div id="nombre-usuario" class="text-sm text-gray-900 dark:text-gray-100">
                                            <!-- Poner el nombre del usuario que recibimos -->
                                            {{ $loan->user_id }}

                                            </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div id="nombre-item" class="text-sm text-gray-900 dark:text-gray-100">
                                            {{ $loan->item_id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 dark:text-gray-100">{{ $loan->checkout_date }}
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
                                                <a href="{{ route('loans.edit', $loan->id) }}"
                                                    class="btn btn-primary">Completar Prestamo</a>
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
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/search.js') }}"></script>
</x-app-layout>
