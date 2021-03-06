<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

@include('layouts.errors')
<div class="panel panel-default">
  <div class="panel-heading">Prêt
    @can('edit', $loan)
    | <a href="{{ route('loan.edit', $loan->id) }}">Modifier</a>
    @endcan
    {!! Form::open(['url' => route('loan.pdf', $loan->id), 'method' => 'get']) !!}

    <td><button type="submit" class="btn-success btn-sm "><i class="fa fa-plus-circle"></i> Imprimer</button></td>
    {!! Form::close() !!}


  </div>

  <div class="panel-body">
    <h2>Id du prêt : {{ $loan->id }}</h2>

    {!! Form::open(['url' => route('loan.savechanges', $loan->id), 'method' => 'post']) !!}

    <div class="row" style="padding-bottom:20px;">
    	<div  class="col-sm-4 col-md-4">
    		{!! Form::label('side', 'Date de début : ', []) !!}
        {!! Form::date('date_start', $loan->date_start, ['class'=>'form-control', 'style'=>'max-width: 150px;']) !!}
    	</div>
      <div  class="col-sm-4 col-md-4">
    		{!! Form::label('quantity', 'Date de fin : ', []) !!}
        {!! Form::date('date_end', $loan->date_end, ['class'=>'form-control', 'style'=>'max-width: 150px;']) !!}
    	</div>
      <div  class="col-sm-4 col-md-4">
        {{ Form::submit('Sauvegarder modifications', array('class' => 'btn-success', 'style'=>'margin-top: 30px;')) }}

        {{-- <td><button type="submit" class="btn-success btn-sm ajout_loan" ><i class="fa fa-plus-circle"></i> Ajouter au prêt</button></td> --}}
      </div>
    </div>

    {!! Form::close() !!}


    <div class="row" style="padding-bottom:20px;">
      <div  class="col-sm-4 col-md-4">
        {!! Form::label('creation', '1. Crée par : '.$loan->created_by, []) !!}
      </div>
      <div  class="col-sm-4 col-md-4">
        {!! Form::label('ref', '2. Pour le patient : '.$patient->reference, []) !!}
      </div>
      <div  class="col-sm-4 col-md-4">
        {!! Form::label('modif', '3. Modifié par : '.$loan->modified_by, []) !!}
      </div>
    </div>

    <p>
      <strong>Products:</strong>

      @if($loan->products == null)
        "hello"
      @else
      <table class="table table-striped table-responsive">

        <thead>
          <tr>
            <th>Nom</th>
            <th>Qté</th>
            <th>Prix</th>
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
          <meta name="csrf_token" content="{{ csrf_token() }}"/>


          @foreach($loan->products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->pivot->quantity_loan }}</td>
            <td>{{ $product->price }} CHF</td></td>
            <td><button type="submit" class="btn btn-danger btn-xs delete_pro_loan" data-loan="{{ $loan->id }}" data-product="{{ $product->id }}" data-quantity="{{ $product->pivot->quantity_loan }}" > X</button></td>
          </tr>
          @endforeach

        </tbody>

      </table>
      @endif

    </p>
    <hr>
    <div class="row">
      <div class="col-md-6 text-right">
        {{ $loan->created_at->format('l jS \\of F Y') }}
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Choisissez un produit</div>
  <div class="panel-body">
    <div class="container" style="width: 100%;" >
      <div class="alert alert-danger info" style="display:none;">
        <ul></ul>
      </div>
      <div class="row table-responsive">
        <table id="table_product" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nom du produit - Id</th>
              <th>Categorie</th>
              <th>Q</th>
              <th>Qté</th>
              <th>Ajout</th>
            </tr>
          </thead>
          <tbody id="product-list" name="product-list">

            @foreach($products as $product)
            <tr id="product{{ $product->id }}">


              <td>{{ $product->name }} </td>
              <td><p>{{ $product->categorie->name }}</p></td>
              <td><p>{{ $product->stock->quantity }}</p></td>
              {!! Form::open(['url' => route('addproductloan.loan', $loan->id), 'method' => 'post']) !!}
              {!! Form::hidden('product_id', $product->id) !!}
              <td>{!! Form::number('machin', 1, array('id' => 'machin', 'class' => 'machin', 'style'=>'max-width: 40px;')) !!}</td>

              @if ($product->stock->quantity === 0.00)
              <td><p>Produit fini</p></td>
              @else
              <td><button type="submit" class="btn-success btn-sm ajout_loan" id="btn-ajout-pro-loan" data-la="{{ $product->stock->quantity }}"><i class="fa fa-plus-circle"></i> Ajouter au prêt</button></td>
              @endif

              {!! Form::close() !!}

            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#table_product').DataTable();
});
</script>
