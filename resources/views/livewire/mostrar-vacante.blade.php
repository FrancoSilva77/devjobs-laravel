<div class="p-10">
    <div class="mb-5">
        <h3 class="text-3xl font-bold text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Empresa:
                <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse:
                <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}<span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria:
                <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}<span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario:
                <span class="normal-case font-normal">{{ $vacante->salario->salario }}<span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                alt="{{ 'Imagen Vacante' . $vacante->titulo }}">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a href="{{ route('register') }}" class="font-bold text-indigo-600">Obten
                    una cuenta y aplica a esta vacante</a>
            </p>
        </div>
    @endguest


    {{-- * Forma 1 --}}
    {{-- @can('create', App\Models\Vacante::class)
        
    @else
        @livewire('postular-vacante')
        @endcan --}}

    @cannot('create', App\Models\Vacante::class)
        @livewire('postular-vacante')
    @endcannot


</div>
