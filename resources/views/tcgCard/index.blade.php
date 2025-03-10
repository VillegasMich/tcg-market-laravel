@extends('layout.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
  <div class="row">
    @foreach ($viewData['tcgCards'] as $tcgCard)
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
@endsection
