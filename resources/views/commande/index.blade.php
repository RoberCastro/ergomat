@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Tous les commandes</div>

    <div class="panel-body">
      @if($commandes->isEmpty())
        <p>Vous n'avez pas encore des commandes.</p>
      @else
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Date de la commande</th>
              <th>Prix</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody>
            @foreach($commandes as $commande)
              <tr>
                <td><a href="{{ route('commande.show', $commande->id) }}">{{ $commande->id }}</a></td>
                <td><p>{{ $commande->date_commande }}</p></td>
                <td><p>{{ $commande->price }}</p></td>
                <td>
                  <td>
                    <a role="button" class="btn btn-info" href="{{ route('commande.show', $commande->id) }}">Voir</a>
                  </td>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      <a href="{{ route('commande.create') }}" class="btn btn-info">Créer une commande</a>
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
