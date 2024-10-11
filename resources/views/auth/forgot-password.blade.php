<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Olvidó su contraseña? No hay problema. Solo escribe tu correo y te enviaremos un link para resetearlo.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between my-5">

            <x-link :href="route('register')">
                Crear Cuenta
            </x-link>

            <x-link :href="route('loginp')">
                ¿Ya tiene un usuario?
            </x-link>

        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Link de reseteo de contraseña') }}
        </x-primary-button>
    </form>
</x-guest-layout>
