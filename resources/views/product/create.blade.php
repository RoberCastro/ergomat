@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('layouts.errors')
            <div class="panel panel-default">
                <div class="panel-heading">Créer un produit</div>
                <div class="panel-body">
                    {!! Form::open(['route' => 'product.store']) !!}

                        @include('product.form')
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection