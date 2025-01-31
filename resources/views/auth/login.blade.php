<x-guest-layout>
    <div class="container mx-auto p-4 md:p-8">
        <!-- Header -->
        <header class="text-center mb-6">
            <h1 class="text-2xl md:text-4xl font-semibold text-gray-800">Selamat Datang!</h1>
            <p class="mt-2 text-gray-600">Masuk untuk mengakses akun Anda.</p>
        </header>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="bg-white shadow rounded-lg p-6 md:p-8">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring focus:ring-indigo-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring focus:ring-indigo-200" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>
            </div>

            <div class="flex justify-center mt-6">
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-500 text-white rounded-md px-4 py-2 transition duration-150">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <footer class="mt-8 text-center">
        <p class="text-gray-500 text-xs">Made with ♥</p>
    </footer>
</x-guest-layout>