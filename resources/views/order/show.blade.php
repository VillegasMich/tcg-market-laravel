{{-- Author: Miguel Vasquez Bojanini. --}}

@extends('layout.app')
@section('title', $viewData['title'])

@section('content')
    <main class="mt-2">
        A total of <strong>${{ $viewData['order']->getTotal() }} US dollars</strong> paid by
        <strong>{{ $viewData['order']->getPaymentMethod() }}</strong>
        <li>Status: {{ $viewData['order']->getStatus() }}</li>
    </main>
@endsection
