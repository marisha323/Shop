    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <div class="centr_l_r">
        <div class="login_">
            <h2>VENDELLA DEMIAN</h2>
            <div class="w_login">
             <h1>Welcome Back!</h1>
             <a href="/login">Sign In</a>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create An Account</h1>
                <!-- Name -->
                <div class="name">
                    <i class="icon_name"></i>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="email">
                    <i class="icon_email"></i>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="password">
                    <i class="icon_pass"></i>
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="password">
                    <i class="icon_pass"></i>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Referral code -->
                <input type="hidden" name="referral_code" value="{{ request('referral_code') }}">

                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}

                    <x-primary-button class="btn">
                        {{ __('Sign Up') }}
                    </x-primary-button>
                </div>
            </form>
    </div>
