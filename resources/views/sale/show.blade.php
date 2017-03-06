<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

  @include('layouts.errors')
  <div class="panel panel-default">
    <div class="panel-heading">Ma vente
      @can('edit', $sale)
        | <a href="{{ route('sale.edit', $sale->id) }}">Modifier</a>
      @endcan
    </div>

    <div class="panel-body">
      <h2>Id de la vente : {{ $sale->id }}</h2>

      <p>Date de fin :
        {{ Carbon\Carbon::parse($sale->date_sale)->format('d-M-Y')  }}
      </p>
      <p>Crée par :
        {{ $sale->created_by }}
      </p>
      <p>Modifié par :
        {{ $sale->modified_by }} en: {{ Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y')  }}
      </p>
      <hr>
      <div class="row">
        <div class="col-md-6 text-right">
          {{ $sale->created_at->format('l jS \\of F Y') }}
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
                <th>Nom du produit</th>
                <th>Ajout</th>
                <th>Prix</th>

              </tr>
            </thead>
            <tbody id="product-list" name="product-list">
              @foreach($products as $products)
                <tr id="product{{ $products->id }}">

                  <td>{{ $products->name }}</td>

                  {!! Form::open(['url' => route('product.show', $products->id), 'method' => 'delete']) !!}
                  <td><button type="submit" class="btn-success btn-sm" id="btn-ajout-pro-pret"><i class="fa fa-plus-circle"></i> Ajouter à la vente</button></td>
                  {!! Form::close() !!}

                  <td>{{ $products->price }}</td>

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
