@extends('layout.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Auth.verify_email') }}</div>
          <div class="card-body">
            @if (session('resent'))
              <div class="alert alert-success" role="alert">
                {{ __('Auth.verification_link_1') }}
              </div>
            @endif
            {{ __('Auth.verification_link_2') }}
            {{ __('Auth.verification_link_3') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
              @csrf
              <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('Auth.verification_link_4') }}</button>.
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
