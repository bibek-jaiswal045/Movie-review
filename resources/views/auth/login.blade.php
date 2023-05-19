<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- <div class="form-check">
            <input class="form-check-input " type="radio" name="isAdmin" id="isAdmin" value="1" >
            <label class="form-check-label text-white" for="isAdmin">
             I am an admin
            </label>
          </div>
        
          <div class="form-check">
            <input class="form-check-input" type="radio" name="isAdmin" id="isAdmin" value="0" >
            <label class="form-check-label text-white" for="isAdmin">
              I am a user
            </label>

          </div> --}}
        
        
        
        

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>

            
            
            
        </div>
        <div class="flex items-center justify-ceneter mt-4">

            <x-socialite-link class="ml-4" href="{{ url('redirect/github') }}">
                {{ __('Use Github') }}
            </x-socialite-link>

            <x-socialite-link class="ml-4" href="{{ url('redirect/facebook') }}">
                {{ __('Use Facebook') }}
            </x-socialite-link>
            
            
            <x-socialite-link class="ml-4" href="{{ url('redirect/google') }}">
                {{ __('Use Google') }}
            </x-socialite-link>
        </div>
    </form>
</x-guest-layout>
