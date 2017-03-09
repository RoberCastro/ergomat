@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Tous les ventes</div>

  <div class="panel-body">
    @if($sales->isEmpty())
    <p>Vous n'avez pas encore des ventes.</p>
    @else
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Date de la vente</th>
          <th>Prix</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sales as $sale)
        <tr>
          <td><a href="{{ route('sale.show', $sale->id) }}">{{ $sale->id }}</a></td>
          <td><p>{{ $sale->date_sale }}</p></td>
          <td><p>{{ $sale->price }}</p></td>          
          <td>
            <a role="button" class="btn btn-info" href="{{ route('sale.show', $sale->id) }}">Voir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <a href="{{ route('sale.create') }}" class="btn btn-info">Créer une vente</a>
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
