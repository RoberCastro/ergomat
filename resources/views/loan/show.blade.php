
<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

@include('layouts.errors')
<div class="panel panel-default">
  <div class="panel-heading">Mon prêt
    @can('edit', $loan)
    | <a href="{{ route('loan.edit', $loan->id) }}">Modifier</a>
    @endcan
  </div>

  <div class="panel-body">
    <h2>Id du prêt : {{ $loan->id }}</h2>
    <p>Date de début :
      {{ Carbon\Carbon::parse($loan->date_start)->format('d-M-Y') }}
    </p>
    <p>Date de fin :
      {{ Carbon\Carbon::parse($loan->date_end)->format('d-M-Y')  }}
    </p>
    <p>Crée par :
      {{ $loan->created_by }}
    </p>
    <p>Modifié par :
      {{ $loan->modified_by }} en: {{ Carbon\Carbon::parse($loan->updated_at)->format('d-M-Y')  }}
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
  <div class="col-sm-8 col-md-8" style="padding-left : 30px;">
    <div class="row">
      <div class="panel panel-default" >
        <div class="panel-heading">Choisissez un produit</div>
        <div class="panel-body">
          <div class="container" style="width: 100%;" >
            <button class="btn-success btn-sm" id="btn-add"><i class="fa fa-plus-circle"></i> Ajouter un produit</button><br/><br/>
            <div class="alert alert-danger info" style="display:none;">
              <ul></ul>
            </div>
            <div class="row">
              <table id="example" class="display nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Nom du produit</th>
                    <th>Prix</th>

                  </tr>
                </thead>
                <tbody id="product-list" name="product-list">
                  @foreach($products as $products)
                  <tr id="product{{ $products->id }}">

                    <td>{{ $products->name }}</td>
                    <td>{{ $products->price }}</td>

                  </tr>
                  @endforeach
                </tbody>
              </table>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                      <h4 class="modal-title" id="myModalLabel">Nouveau produit</h4>
                    </div>
                    <div class="modal-body">
                      {!! Form::open(array('id' => 'frm', 'name' => 'frm', 'class' => 'form-horizontal')) !!}
                      <input id="token" type="hidden" value="{{$encrypted_token}}">
                      @include('product.form')
                      {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->
          </div>
        </div>
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
