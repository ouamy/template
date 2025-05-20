<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <div class="mt-6 flex justify-center">
        <a href="{{ route('google.login') }}" 
           class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm font-semibold text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-blue-500 transition">
          <svg class="w-5 h-5 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
            <path fill="#4285F4" d="M533.5 278.4c0-17.7-1.4-34.8-4-51.3H272v97.3h147.1c-6.4 34.4-26 63.6-55.3 83.3v68h89.5c52.4-48.3 82.2-119.5 82.2-197.3z"/>
            <path fill="#34A853" d="M272 544.3c73.6 0 135.5-24.3 180.6-65.8l-89.5-68c-24.9 16.8-56.9 26.7-91.1 26.7-70 0-129.4-47.4-150.7-111.2h-90.1v69.8C73.8 487.9 166.2 544.3 272 544.3z"/>
            <path fill="#FBBC05" d="M121.3 327.9c-10.3-30.7-10.3-63.6 0-94.3v-69.8h-90.1c-38.7 75.9-38.7 166.6 0 242.5l90.1-69.8z"/>
            <path fill="#EA4335" d="M272 107.7c39.9 0 75.7 13.7 104 40.6l78-78c-48-44.9-111.2-72.7-182-72.7-105.7 0-198 56.4-241.3 138.7l90.1 69.8c21.3-63.8 80.7-111.4 150.7-111.4z"/>
          </svg>
          Connexion avec Google
        </a>
    </div>
    </x-authentication-card>
</x-guest-layout>
