{{-- Author: Miguel Vasquez Bojanini. --}}

@extends('layout.app')
@section('title', $viewData['title'])

@section('content')
    <main class="container-fluid vh-100 mt-2">
        <h1>{{ $viewData['title'] }}</h1>
        <ul>
            @foreach ($viewData['orders'] as $order)
                <li>
                    <a href="{{ route('order.show', ['id' => $order->getId()]) }}">
                        Order with <strong>id: {{ $order->getId() }}</strong> with a total of
                        ${{ $order->getTotal() }} US dollars 💵.
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
@endsection
