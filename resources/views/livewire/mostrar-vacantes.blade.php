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
                    {{-- <button wire:click="$dispatch('prueba',{ vacante_id: {{ $vacante->id }}})" --}}
                    <button wire:click="$dispatch('mostrarAlerta',{ vacante_id: {{ $vacante->id }}})"
                        class="bg-red-600 py-2 items-center text-center px-4 rounded-lg text-white text-xs font-bold uppercase">
                        Eliminar
                    </button>
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

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', ({
                vacante_id
            }) => {
                Swal.fire({
                    title: 'Eliminar Vacante',
                    text: "Una vacante eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar la vacante
                        Livewire.dispatch('eliminarVacante', {
                            vacante: vacante_id
                        })

                        Swal.fire(
                            'Se elimino la vacante',
                            'Eliminado Correctamente',
                            'success'
                        )
                    }
                })
            })
        })
    </script>
@endpush
