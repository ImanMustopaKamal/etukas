<x-guest-layout>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <div class="brand-logo"></div>
            </div>
            <!-- /Logo -->
            <h4 class="mb-3 text-center">APLIKASI E-TUKAS</h4>
            <p class="mb-4 text-center">Elektronik - Try Out Uji Kompetensi As Syifa</p>
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="mb-3">
                <x-label for="name" :value="__('Name')" />
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" autofocus />
              </div>
              <div class="mb-3">
                <x-label for="email" :value="__('Email')" />
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" />
              </div>
              <div class="mb-3">
                <x-label for="nim" :value="__('NIM')" />
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Enter your nim" />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <x-label for="password" :value="__('Password')" />
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="current-password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <x-label for="password_confirmation" :value="__('Confirm Password')" />
                  <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" autocomplete="current-password_confirmation" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-secondary d-grid w-100" type="submit">Register</button>
              </div>
              <div class="mb-3 text-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                  {{ __('Already registered?') }}
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>