@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Dashboard</div>

  <div class="panel-body">
    @if($products->isEmpty())
    <p>Vous n'avez pas encore d'product.</p>
    @else
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Categorie</th>
          <th>Status</th>
          <th>Côté</th>
          <th>Prix</th>
          <th>Voir</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr>
          <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
          <td><p>{{ $product->categorie->name }}</p></td>
          <td><p>{{ $product->statu->name }}</p></td>
          <td><p>{{ $product->side }}</p></td>
          <td><p>{{ $product->price }}</p></td>
          <td>
            <a role="button" class="btn btn-info" href="{{ route('product.show', $product->id) }}">Voir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <a href="{{ route('product.create') }}" class="btn btn-info">Créer un product</a>
  </div>
</div>
@endsection
