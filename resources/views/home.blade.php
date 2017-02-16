@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
                    You are logged in!
                    <a href="{{ route('product.index') }}" class="btn btn-info">Voir tous les produits</a>
                    <a href="{{ route('loan.index') }}" class="btn btn-info">Voir tous les prêts</a>


                    @if(Auth::user()->isadmin)
                    <a href="{{ route('admin') }}" class="btn btn-warning">Administration</a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
