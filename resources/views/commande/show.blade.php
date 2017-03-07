<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Ma commande
    @can('edit', $commande)
    | <a href="{{ route('commande.edit', $commande->id) }}">Modifier</a>
    @endcan
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
    <p>
      <strong>Products:</strong>
      <ul>
        @foreach($commande->products as $product)
        <li>{{ $product->name }} - {{ $product->id }} - {{ $product->pivot->quantity_comm }}</li>
        @endforeach
      </ul>
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
      <div class="alert alert-danger info" style="display:none;">
        <ul></ul>
      </div>
      <div class="row">
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nom du produit - Quantité - Id</th>
              <th>Qté</th>
              <th>Ajout</th>
              <th>Prix</th>
            </tr>
          </thead>
          <tbody id="product-list" name="product-list">

            @foreach($products as $product)
            <tr id="product{{ $product->id }}">

              <td>{{ $product->name }} - {{ $product->quantity }} - {{ $product->id }}</td>
              {!! Form::open(['url' => route('addproduct.commande', $commande->id), 'method' => 'post']) !!}
              {!! Form::hidden('product_id', $product->id) !!}
              <td>{!! Form::number('qty_pro', 1, array('style'=>'max-width: 40px;')) !!}</td>
              @if (!$commande->products->contains($product))
              <td><button type="submit" class="btn-success btn-sm" id="btn-ajout-pro-commande"><i class="fa fa-plus-circle"></i> Ajouter à la commande</button></td>
                @else
                <td>{!! Form::label('date_commande', 'Produit ajouté', []) !!}</td>
                @endif

              {!! Form::close() !!}

              <td>{{ $product->price }}</td>

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
  $('#example').DataTable();
});
</script>
