<x-guest-layout>
    
    <div class="mb-6">
        <h1 class="text-gray-700 text-2xl font-bold">SIGN IN</h1>
        <p class="text-base text-gray-400">Masukan E-mail dan password dan Nikmati Kemudahan Kelola Toko Anda</p>
    </div>
    <x-jet-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <input id="email" class="block mt-1 w-full form-input" type="email" name="email" autocomplete="off" :value="old('email')" required autofocus />
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <input id="password" class="block mt-1 w-full form-input" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="mt-4 flex items-center justify-between">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="underline text-sm ml-auto text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            
            <button type="submit" class="btn btn-indigo w-full" class="ml-4">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</x-guest-layout>
