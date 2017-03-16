@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Dashboard</div>

  <div class="panel-body">
    @if($products->isEmpty())
    <p>Vous n'avez pas encore d'product.</p>
    @else
    <table id="table_product" class="display nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nom du produit - Id</th>
          <th>Categorie</th>
          <th>Status</th>

          <th>Q</th>
          <th>Qté</th>
        </tr>
      </thead>
      <tbody id="product-list" name="product-list">

        @foreach($products as $product)
        <tr id="product{{ $product->id }}">


          <td>{{ $product->name }} </td>
          <td><p>{{ $product->categorie->name }}</p></td>
          <td><p>{{ $product->categorie->name }}</p></td>
          <td><p>{{ $product->categorie->name }}</p></td>
          {{-- <td><p>{{ $product->statu->name }}</p></td> --}}
          {{-- <td>  <label> {{ $product->quantity }} </label> </td> --}}
          <td>
            <a role="button" class="btn btn-info" href="{{ route('product.show', $product->id) }}">Voir</a>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
    @endif
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
