@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Tous les products</div>

    <div class="panel-body">
      @if($products->isEmpty())
        <p>Vous n'avez pas encore d'product.</p>
      @else
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Côté</th>
              <th>Suprimmer?</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
              <tr>
                <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                <td><a href="{{ route('product.show', $product->id) }}">{{ $product->side }}</a></td>
                <td>
                  <!-- Attention il faut travailler les authorisations comme dans l'example du prof -->
                  {!! Form::open(['url' => route('product.destroy', $product->id), 'method' => 'delete']) !!}
                  <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                  {!! Form::close() !!}

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      <a href="{{ route('product.create') }}" class="btn btn-info">Créer un product</a>
    </div>    
  </div>
</div>
@endsection
