<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<header>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</header>
<div class="centr_l_r">
<!-- Session Status -->
{{-- bhfgh --}}
<x-auth-session-status class="mb-4" :status="session('status')" />
<div class="login_">
    <h2>VENDELLA DEMIAN</h2>
    <div class="w_login">
     <h1>Not Registered?</h1>
     <a href="/login">Sign Up</a>
    </div>
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Log in</h1>
    <!-- Email Address -->
    <div class="email">
        <i class="icon_email"></i>
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="password">
        <i class="icon_pass"></i>

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" placeholder="Password"/>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="remember_m">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
       

        <x-primary-button class="btn">
            {{ __('Log in') }}
        </x-primary-button>
    </div>
    <div>
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif
    </div>
</form>

</div>
    