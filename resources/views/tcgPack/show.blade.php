@extends('layout.app')
@section('content')
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset($viewData['tcgPack']->getImage()) }}" class="img-fluid rounded-start">
                <div class="card-footer">
                    <form action="{{ route('tcgPack.delete', $viewData['tcgPack']->getId()) }} }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar Carta</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $viewData['tcgPack']->getName() }}
                    </h5>
                </div>
                <div class="card-footer">
                    <div class="row">
                        @foreach ($viewData['tcgPack']->getTcgCards() as $tcgCard)
                            <div class="col-md-4 col-lg-3 mb-2">
                                <div class="card">
                                    <img src="{{ asset($tcgCard->getImage()) }}" class="img-fluid rounded-start">
                                    <div class="card-body text-center">
                                        <a href="{{ route('tcgCard.show', $tcgCard->getId()) }}"
                                            class="btn bg-primary text-white">{{ $tcgCard->getId() }} -
                                            {{ $tcgCard->getName() }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        @endsection
