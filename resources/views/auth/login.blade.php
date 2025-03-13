@extends('layout.app')

@section('content')
  <div class="w-full mx-auto px-4">
    <div class="flex justify-center items-center min-h-screen">
      <div class="w-full md:w-5/12">
        <div class="bg-white shadow rounded-lg overflow-hidden">
          <div class="bg-gray-100 px-6 py-4 border-b">
            <h2 class="text-xl font-semibold">{{ __('Login') }}</h2>
          </div>
          <div class="p-6">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <!-- Email -->
              <div class="flex mb-3">
                <label for="email" class="w-1/3 text-right pr-4 pt-2">
                  {{ __('Email Address') }}
                </label>
                <div class="w-2/3">
                  <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                  @error('email')
                    <span class="text-red-600 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <!-- Password -->
              <div class="flex mb-3">
                <label for="password" class="w-1/3 text-right pr-4 pt-2">
                  {{ __('Password') }}
                </label>
                <div class="w-2/3">
                  <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                  @error('password')
                    <span class="text-red-600 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <!-- Remember Me -->
              <div class="flex mb-3">
                <div class="w-2/3 ml-1/3">
                  <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                      class="form-checkbox h-4 w-4 text-blue-600">
                    <label for="remember" class="ml-2 text-gray-700">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
              </div>

              <!-- Submit Button and Forgot Password -->
              <div class="flex mb-0">
                <div class="w-full md:w-2/3 ml-1/3">
                  <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    {{ __('Login') }}
                  </button>
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline ml-4">
                      {{ __('Forgot Your Password?') }}
                    </a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
