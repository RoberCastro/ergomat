@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Mon product
        <!-- <a href="{{ route('product.edit', $product->id) }}">Modifier</a> -->
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
@endsection
