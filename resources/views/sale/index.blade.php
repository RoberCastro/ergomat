@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Toutes les ventes</div>

  <div class="panel-body table-responsive">
    @if($sales->isEmpty())
      <p>Vous n'avez pas encore des ventes.</p>
    @else
      <table id="table_sale" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Date de la vente</th>
          <th>Prix</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sales as $sale)
        <tr>
          <td><a href="{{ route('sale.show', $sale->id) }}">{{ $sale->id }}</a></td>
          <td><p>{{ $sale->date_sale }}</p></td>
          <td><p>{{ $sale->price }}</p></td>
          <td>
            <a role="button" class="btn btn-info" href="{{ route('sale.show', $sale->id) }}">Voir</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <a href="{{ route('sale.create') }}" class="btn btn-info">Créer une vente</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Produits disponibles</div>
  <div class="panel-body">
    <div class="row">

      @include('layouts.errors')
      <a href="{{ route('product.create') }}">Ajouter un produit</a>
    </div>
  </div>
</div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_sale').DataTable();
    });
</script>
