@extends('layout.app')
@section('content')
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset($viewData['tcgCard']->getImage()) }}" class="img-fluid rounded-start">
        <div class="card-footer">
          <form action="{{ route('tcgCard.delete', $viewData['tcgCard']->getId()) }} }}" method="POST"
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
            {{ $viewData['tcgCard']->getName() }}
          </h5>
          <p class="card-text">{{ $viewData['tcgCard']->getDescription() }}</p>
          <p class="card-text"><span class="fw-bold">Precio: </span> ${{ $viewData['tcgCard']->getPrice() }}</p>
          <p class="card-text"><span class="fw-bold">Franquicia: </span>{{ $viewData['tcgCard']->getFranchise() }}
          </p>
          <p class="card-text"><span class="fw-bold">Grado PSA: </span>{{ $viewData['tcgCard']->getPSAGrade() }}
          </p>
          <p class="card-text"><span class="fw-bold">Rareza: </span>{{ $viewData['tcgCard']->getRarity() }}</p>
          <p class="card-text"><span class="fw-bold">Lenguaje: </span>{{ $viewData['tcgCard']->getLanguage() }}
          </p>
          <p class="card-text"><span class="fw-bold">En bodega: </span>{{ $viewData['tcgCard']->getStock() }}</p>
        </div>
        <div class="card-footer">
          @foreach ($viewData['tcgCard']->getTcgPacks() as $tcgPack)
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

      </div>
    </div>
  @endsection
