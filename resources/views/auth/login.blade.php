<x-guest-layout>
  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-auth-card>
    <x-slot name="logo">

    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="d-flex justify-content-lg-center">
      <div class="d-flex flex-column mb-3">
        <div class="p-2">
          <h1>Aplikasi e-tukas</h1>
        </div>
        <div class="p-2">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
              <x-label for="username" :value="__('Username')" />

              <x-input id="username" class="block mt-1 w-full" type="username" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
              <x-label for="password" :value="__('Password')" />

              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
              <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
            </div>

            <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
              @endif

              <x-button class="ml-3">
                {{ __('Log in') }}
              </x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </x-auth-card>
</x-guest-layout>