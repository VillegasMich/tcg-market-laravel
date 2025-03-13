@extends('layout.app')
@section('content')
  <div class="w-full mx-auto px-4">
    <div class="flex justify-center items-center min-h-screen">
      <div class="w-full md:w-6/12">
        <div class="bg-white shadow rounded-lg overflow-hidden">
          <div class="bg-gray-100 px-6 py-4 border-b">
            <h2 class="text-xl font-semibold">{{ __('Register') }}</h2>
          </div>
          <div class="p-6">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <!-- Name -->
              <div class="flex mb-3">
                <label for="name" class="w-1/3 text-right pr-4 pt-2">{{ __('Name') }}</label>
                <div class="w-2/3">
                  <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    autocomplete="name" autofocus
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                  @error('name')
                    <span class="text-red-600 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <!-- Email Address -->
              <div class="flex mb-3">
                <label for="email" class="w-1/3 text-right pr-4 pt-2">{{ __('Email Address') }}</label>
                <div class="w-2/3">
                  <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="email"
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
                <label for="password" class="w-1/3 text-right pr-4 pt-2">{{ __('Password') }}</label>
                <div class="w-2/3">
                  <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                  @error('password')
                    <span class="text-red-600 text-sm" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <!-- Confirm Password -->
              <div class="flex mb-3">
                <label for="password-confirm" class="w-1/3 text-right pr-4 pt-2">{{ __('Confirm Password') }}</label>
                <div class="w-2/3">
                  <input id="password-confirm" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
              </div>

              <div class="flex mb-3">
                <label for="address" class="w-1/3 text-right pr-4 pt-2">{{ __('Address') }}</label>
                <div class="w-2/3">
                  <input id="address" type="text" name="address" required autocomplete="address"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
              </div>

              <div class="flex mb-3">
                <label for="role" class="w-1/3 text-right pr-4 pt-2">{{ __('Role') }}</label>
                <select id="role" name="role" required
                  class="flex-grow border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                  <option value="regular">Regular</option>
                  <option value="admin">Admin</option>
                </select>
              </div>

              <!-- Submit -->
              <div class="flex mb-0">
                <div class="w-full md:w-2/3 ml-auto">
                  <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
