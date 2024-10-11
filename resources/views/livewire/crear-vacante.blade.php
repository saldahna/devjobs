{{-- 
    wire:model es la manera en como livewire se comunica con el formulario
    No es necesario @csrf, livewire lo maneja.

    Los registros de BD para traer Salarios y Categorías vienen de la clase "app/Livewire/CrearVacante.php", que a su vez se debe crear un modelo "app/Models/Salario.php"

    "wire:submit.prevent='crearVacante'" se crea una función "crearVacante" en la case "app/Livewire/CrearVacante.php"

    La variable $message se registra en la case "app/livewire/MostrarAlerta.php"
--}}

<form class="space-y-5 w-3/5" wire:submit.prevent="crearVacante">

    {{-- Título --}}
    <div>
        <x-input-label for="titulo" :value="__('Título Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Título Vacante" />
        {{-- <x-input-error :messages="$errors->get('titulo')" class="mt-2" /> --}}
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
            {{-- El atributo :message al ser dinámico, se tiene que registrar en la clase, en este caso, en app/Livewire/MostrarAlerta.php --}}
        @enderror
    </div>

    <div class="flex flex-row justify-between gap-2">

        {{-- Salario Mensual --}}
        <div class="w-full">
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <select wire:model="salario" id="salario" class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-sky-600 focus:ring-indigo-500 dark:focus:ring-sky-600 rounded-md shadow-sm">
                <option> --Seleccione-- </option>
                @foreach ( $salarios as $salario )
                    <option value="{{ $salario->id }}"> {{ $salario->salario }} </option>
                @endforeach
            </select>
            @error('salario')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
    
        {{-- Categoría --}}
        <div class="w-full">
            <x-input-label for="categoria" :value="__('Categoría')" />
            <select wire:model="categoria" id="categoria" class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-sky-600 focus:ring-indigo-500 dark:focus:ring-sky-600 rounded-md shadow-sm">
                <option> --Seleccione-- </option>
                @foreach ( $categorias as $categoria )
                    <option value="{{ $categoria->id }}"> {{ $categoria->categoria }} </option>
                @endforeach
            </select>
            @error('categoria')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

    </div>

    <div class="flex flex-row justify-between gap-2">

        {{-- Empresa --}}
        <div class="w-full">
            <x-input-label for="empresa" :value="__('Empresa')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa: ej. Netflix, Uber, Shopify" />
            {{-- <x-input-error :messages="$errors->get('empresa')" class="mt-2" /> --}}
            @error('empresa')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>
    
        {{-- Último día para postularse --}}
        <div class="w-full">
            <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" />
            {{-- <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" /> --}}
            @error('ultimo_dia')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

    </div>

    {{-- Descripción del puesto --}}
    <div>
        <x-input-label for="descripcion" :value="__('Descripción')" />
        <textarea wire:model="descripcion" id="descripcion" class="mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-sky-600 focus:ring-indigo-500 dark:focus:ring-sky-600 rounded-md shadow-sm" cols="30" rows="10"></textarea>
        {{-- <x-input-error :messages="$errors->get('descripcion')" class="mt-2" /> --}}
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    {{-- Imagen --}}
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />
        {{-- <x-input-error :messages="$errors->get('imagen')" class="mt-2" /> --}}

        <div class="my-5">
            @if ( $imagen )
                Imagen Previa:
                <img src="{{ $imagen->temporaryUrl() }}" class="mt-2 w-80">
            @endif
        </div>
        
        @error('imagen')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        Crear Vacante
    </x-primary-button>

    <div wire:loading wire:target="imagen">Uploading...</div>

</form>
