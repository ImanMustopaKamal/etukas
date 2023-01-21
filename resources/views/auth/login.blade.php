<x-guest-layout>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <div class="brand-logo"></div>
            </div>
            <!-- /Logo -->
            <h4 class="mb-3 text-center">APLIKASI E-TUKAS</h4>
            <p class="mb-4 text-center">Elektronik - Try Out Uji Kompetensi As Syifa</p>

            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="mb-3">
                <x-label for="nim" :value="__('NIM')" />
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your nim" autofocus />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <x-label for="password" :value="__('Password')" />
                  <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="current-password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-secondary d-grid w-100" type="submit">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  <!-- <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <div class="brand-logo" style="width: 100px; height: 100px;"></div>
      </a>
    </x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div>
        <x-label for="nim" :value="__('NIM')" />

        <x-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')" required autofocus />
      </div>

      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
      </div>

      <div class="block mt-1">
        <label for="remember_me" class="inline-flex items-center">

        </label>
      </div>

      <div class="flex items-center justify-end mt-4">
        
        <x-button class="ml-3">
          {{ __('Log in') }}
        </x-button>
      </div>
    </form>
  </x-auth-card> -->
</x-guest-layout>