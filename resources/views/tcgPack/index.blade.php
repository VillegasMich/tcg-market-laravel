@extends('layout.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
  <div class="row">
    @foreach ($viewData['tcgPacks'] as $tcgPack)
      <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
          <img src="{{ asset($tcgPack->getImage()) }}" class="img-fluid rounded-start">
          <div class="card-body text-center">
            <a href="{{ route('tcgPack.show', $tcgPack->getId()) }}"
              class="btn bg-primary text-white">{{ $tcgPack->getId() }} -
              {{ $tcgPack->getName() }}</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
