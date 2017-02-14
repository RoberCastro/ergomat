@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Mon product
          @can('edit', $product)
          | <a href="{{ route('product.edit', $product->id) }}">Modifier</a>
          @endcan
        </div>

        <div class="panel-body">
          <h2>{{ $product->name }}</h2>
          <p>
            {{ $product->description }}
          </p>
          <hr>
          <div class="row">
            <div class="col-md-6 text-right">
              {{ $product->created_at->format('l jS \\of F Y') }}
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection