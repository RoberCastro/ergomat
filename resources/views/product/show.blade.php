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
            <div class="table-responsive">

                <table class="table table-bordered col-lg-6">

                    <tbody>
                    <tr>
                        <td class="success">Disponible</td>
                        <td>{{$product->stock->available}}</td>
                        <td class="warning">Prêté</td>
                        <td >{{$product->stock->loaned}}</td>

                    </tr>
                    <tr>
                        <td class="info">Total</td>
                        <td>{{$product->stock->quantity}}</td>
                        <td class="info">Commandés</td>
                        <td>{{$product->stock->ordered}}</td>
                    </tr>
                    <tr>
                        <td class="danger">En reparation</td>
                        <td>{{$product->stock->reparation}}</td>
                        <td class="danger">Inactive</td>
                        <td>{{$product->stock->inactive}}</td>

                    </tr>

                    </tbody>
                </table>


            </div>
            <hr>

            <div class="row">
                <div class="col-md-6 text-right">
                    <p> Crée le  {{ $product->created_at->format('j MM Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
