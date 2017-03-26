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


                            <td><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></td>
                            <td><p>{{ $product->categorie->name }}</p></td>
                            <td><p>{{ $product->categorie->name }}</p></td>
                            <td>
                                <select class="quants" id="quants" data-quantity="{{$product->stock->quantity}}" ,
                                        data-available="{{$product->stock->available}}" ,
                                        data-inactive="{{$product->stock->inactive}}" ,
                                        data-loaned="{{$product->stock->loaned}}" ,
                                        data-reparation="{{$product->stock->reparation}}" ,
                                        data-ordered="{{$product->stock->ordered }}">
                                    <option value="0">Total</option>
                                    <option value="1" selected>Disponible</option>
                                    <option value="2">Inactive</option>
                                    <option value="3">Prêté</option>
                                    <option value="4">En reparation</option>
                                    <option value="5">Commandés</option>
                                </select>
                            </td>
                            <td><p>{{$product->stock->available}}</p></td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table_product').DataTable();
    });
</script>

