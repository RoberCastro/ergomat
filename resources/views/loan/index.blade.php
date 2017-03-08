@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Tous les prêts</div>

    <div class="panel-body">
      @if($loans->isEmpty())
        <p>Vous n'avez pas encore d'loan.</p>
      @else
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Date de start</th>
              <th>Date de fin</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            @foreach($loans as $loan)
              <tr>
                <td><a href="{{ route('loan.show', $loan->id) }}">{{ $loan->id }}</a></td>
                <td><p>{{ $loan->date_start }}</p></td>
                <td><p>{{ $loan->date_end }}</p></td>
                <td>
                  <a role="button" class="btn btn-info" href="{{ route('loan.show', $loan->id) }}">Voir</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      <a href="{{ route('loan.create') }}" class="btn btn-info">Créer un Prêt</a>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">Produits disponibles</div>
    <div class="panel-body">
      <div class="row">

        @include('layouts.errors')
        <a href="{{ route('product.create') }}">Ajouter un produit</a>
      </div>

    </div>

  </div>
</div>
@endsection
