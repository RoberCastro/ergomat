<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Commande
    {!! Form::open(['url' => route('commande.pdf', $commande->id), 'method' => 'get']) !!}
    <td><button type="submit" class="btn-success btn-sm"><i class="fa fa-plus-circle"></i> Imprimer</button></td>
    {!! Form::close() !!}
  </div>

  <div class="panel-body">
    <h2>Id de la commande : {{ $commande->id }}</h2>

    <p>Date de fin :
      {{ Carbon\Carbon::parse($commande->date_commande)->format('d-M-Y')  }}
    </p>
    <p>Crée par :
      {{ $commande->created_by }}
    </p>
    <p>Modifié par :
      {{ $commande->modified_by }} en: {{ Carbon\Carbon::parse($commande->updated_at)->format('d-M-Y')  }}
    </p>
    <p>Prix de la commande : {{ $commande->price }}   </p>
    <p>
      <strong>Products:</strong>
      @if($commande->price != 0)
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

          @foreach($commande->products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->pivot->quantity_comm }}</td>
            <td>{{ $product->price }} CHF</td></td>
            <td><button type="submit" class="btn btn-danger btn-xs delete_pro_comm" data-commande="{{ $commande->id }}" data-product="{{ $product->id }}" data-quantity="{{ $product->pivot->quantity_comm }}" > X</button></td>
          </tr>
          @endforeach

        </tbody>

      </table>
      @else
      "Pas des produits"
      @endif
  </p>
  <hr>
  <div class="row">
    <div class="col-md-6 text-right">
      {{ $commande->created_at->format('l jS \\of F Y') }}
    </div>
  </div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Choisissez un produit</div>
  <div class="panel-body">
    <div class="container" style="width: 100%;" >
      @if ($errors->any())
      <div class="alert alert-danger info">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row table-responsive">
        <table id="table_product" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nom du produit - Id</th>
              <th>Q</th>
              <th>Qté</th>
              <th>Ajout</th>
              <th>Prix</th>
            </tr>
          </thead>
          <tbody id="product-list" name="product-list">

            @foreach($products as $product)
            <tr id="product{{ $product->id }}">


              <td>{{ $product->name }} </td>
              <td>  <label> {{ $product->quantity }} </label> </td>
              {!! Form::open(['url' => route('addproduct.commande', $commande->id), 'method' => 'post']) !!}
              {!! Form::hidden('product_id', $product->id) !!}
              <td>{!! Form::number('qty_pro', 1, array('id' => 'qty_pro', 'class' => 'qty_pro', 'style'=>'max-width: 40px;')) !!}</td>

              @if ($product->quantity === 0.00)
              <td>{!! Form::label('date_commande', 'Produit fini', []) !!}</td>
              @else
              <td><button type="submit" class="btn-success btn-sm ajout" id="btn-ajout-pro-commande" data-la="{{ $product->quantity }}"><i class="fa fa-plus-circle"></i> Ajouter à la commande</button></td>
              @endif
              <td>{{ $product->price }}</td>

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
