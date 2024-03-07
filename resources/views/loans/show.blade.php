<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-7xl container mx-auto py-6 flex">
        <div class="w-full max-w-7xl mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
                <div class="w-full max-w-7xl p-4 flex flex-col">
                <div class="w-full max-w-7xl flex flex-row justify-around">
                    <div class="p-4">
                        <div class="text-white text-3xl font-bold">{{ $item->name }}</div>
                        <div class="text-white">{{ $item->description }}</div>
                        <div class="text-white">Precio: {{ $item->price }}€</div>
                        
                        <div class="text-white">Prestado a: {{ $user->name }}</div>
                        <div class="text-white">Fecha de préstamo: {{ $loan->checkout_date }}</div>
                        <div class="text-white">Fecha de devolución: {{ $loan->due_date }}</div>
                        {{-- si loan no tiene returned date poner en curso, sino poner la returned date --}}

                        @if ($loan->returned_date == null)
                            <div class="text-white">Estado: Prestamo en curso</div>
                        @else
                            <div class="text-white">Estado: Devuelto</div>
                        @endif

                        <div>
                            @if ($item->box_id != null)
                                <div class=" text-gray-900 dark:text-gray-100">
                                    Caja: {{ $item->box->label }}</div>
                            @else
                                <div class=" text-gray-900 dark:text-gray-100">Sin caja</div>
                            @endif
                        </div>

                    </div>
                    <div class="p-4">
                        <div class="flex flex-col gap-3">
                            <div>
                                @if (filter_var($item->picture, FILTER_VALIDATE_URL))
                                    <img src="{{ $item->picture }}" alt="Portada Actual"
                                        class="w-[200px] h-[200px] mt-2">
                                @elseif ($item->picture != null)
                                    <img src="{{ asset(Storage::url($item->picture)) }}" alt="Portada Actual"
                                        class="w-[200px] h-[200px] mt-2">
                                @else
                                    <div
                                        class="flex items-center justify-center w-[200px] h-[200px] bg-gray-300 dark:bg-gray-600 rounded-md text-gray-400 dark:text-gray-500 text-lg">
                                        <span class="text-center">{{$item->name}}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>

                <div class=" w-full flex flex-row justify-around p-4 gap-3">
                    {{-- si loan no tiene returned date poner un enlace a loans edit que diga devolver, sino un div que ponga completo --}}
                    @if ($loan->returned_date == null)
                    {{-- si el user->id es igual al user autentificado que ponga devolver --}}
                    @if ($user->id == Auth::user()->id)
                    <a href="{{ route('loans.edit', $loan->id) }}" title="Devolver"
                        class="w-full bg-red-600 text-center text-white rounded-lg p-2">Devolver</a>
                    @else
                    <div class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Prestado a {{$loan->user->name}}</div>
                    @endif
                        
                    @else
                    
                    <div class="w-full bg-green-600 text-center text-white rounded-lg p-2">Completo</div>
                    @endif
                    
                    {{-- enlace que vuelva a la pagina anterior en la que se estuviese --}}
                    <a href="{{ url()->previous() }}" title="Volver"
                        class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Volver</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
