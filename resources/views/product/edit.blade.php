@extends('layouts.app')

@section('content')
    <div class="panel panel-default">

        @include('layouts.errors')
        <div class="panel panel-default">
            <div class="panel-heading">Créer un produit</div>
            <div class="panel-body">
              {!! Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', $product->id]]) !!}

                @include('product.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
