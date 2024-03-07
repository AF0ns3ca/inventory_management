<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Item') }}
        </h2>
    </x-slot>

    <div class="w-full max-w-7xl container mx-auto py-6 flex ">
        <div class="w-full max-w-7xl mx-28 bg-gray-700 rounded-lg shadow-md overflow-hidden flex flex-col">
            <div class="w-full max-w-7xl p-4 flex flex-col items-center">
                <div class="w-full max-w-7xl flex flex-row justify-center items-center px-28 relative">
                    <a href="{{ url()->previous() }}"  class="w-full absolute top-0 left-0 p-1" title="Volver">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-6 h-6 dark:stroke-white hover:transition hover:duration-300 hover:ease-in-out hover:scale-150">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                    </a>
                    <div class="w-full h-full p-4 flex flex-col justify-center items-start">
                        <div class="dark:text-gray-100 text-3xl font-bold">{{ $item->name }}</div>
                        <div class="dark:text-gray-100">{{ $item->description }}</div>
                        <div class="dark:text-gray-100">Precio: {{ $item->price }}€</div>
                        <div>
                            @if ($item->box_id != null)
                                <div class=" text-gray-900 dark:text-gray-100">
                                    Caja: {{ $item->box->label }}</div>
                            @else
                                <div class=" text-gray-900 dark:text-gray-100">Sin caja</div>
                            @endif
                        </div>

                    </div>
                    <div class="w-full h-full p-4 flex justify-end items-center">
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

                <div class=" w-full flex flex-row justify-around p-4 gap-3">
                    <a href="{{ route('items.edit', $item->id) }}" title="Editar Item"
                        class="w-full bg-slate-600 text-center text-white rounded-lg p-2">Editar</a>
                    <!-- boton para volver atras -->
                    @if($item->activeLoan())
                                                <a href="{{ route('loans.show', $item->activeLoan()->id) }}" title="Ver Prestamo" class="w-full text-white bg-yellow-600 text-center rounded-lg p-2">Ver Prestamo</a>
                                            @else
                                                <a href="{{ route('loans.create',$item->id) }}" title="Prestar Item" class="w-full text-white bg-green-600 text-center rounded-lg p-2">Prestar</a>
                                            @endif
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
