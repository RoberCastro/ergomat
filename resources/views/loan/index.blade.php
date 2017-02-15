@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tous les prêts</div>

                <div class="panel-body">
                    @if($loans->isEmpty())
                    <p>Vous n'avez pas encore d'loan.</p>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date de start</th>
                                <th>Date de fin</th>
                                <th>products</th>   
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loans as $loan)
                            <tr>
                                <td><a href="{{ route('loan.show', $loan->id) }}">{{ $loan->id }}</a></td>
                                <td><a>{{ $loan->date_start }}</a></td>
                                <td><a>{{ $loan->date_end }}</a></td>
                                <td>
                                    @foreach($loan->products as $product)
                                    <span class="label label-success">{{ $product->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {!! Form::open(['url' => route('loan.destroy', $loan->id), 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <a href="{{ route('loan.create') }}" class="btn btn-info">Créer un Prêt</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Produits disponibles</div>
                <div class="panel-body">
                    <div class="row">
                    
                        @include('layouts.errors')

                        <div class="col-md-4">
                          {!! Form::open(['route' => 'product.store']) !!}
                          <div class="form-group">
                             {!! Form::label('name', 'Ajouter un produit', []) !!}
                             {!! Form::text('name', null, ['class' => 'form-control']) !!}           
                         </div>
                         {!! Form::submit('Ajouter', ['class' => 'btn btn-info btn-sm']) !!}
                         {!! Form::close() !!}  
                     </div>
                     <div class="col-md-8">
                        @if($products->isEmpty())
                        <p>Vous n'avez pas encore de product.</p>
                        @else
                        @foreach($products as $product)
                        <span class="label label-success">{{ $product->name }}</span>
                        @endforeach
                        @endif
                    </div>       
                </div>
            </div>







        </div>
    </div>
</div>
</div>
@endsection