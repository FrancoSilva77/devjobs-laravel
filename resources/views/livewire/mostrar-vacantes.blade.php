<div class="">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="#" class="text-xl font-bold">{{ $vacante->titulo }}</a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-500">Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-col items-stretch  gap-3 md:items-center md:flex-row mt-5 md:mt-0">
                    <a href=""
                        class="bg-slate-800 py-2 items-center text-center px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 items-center text-center px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Editar
                    </a>
                    <a href=""
                        class="bg-red-600 py-2 items-center text-center px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>

</div>