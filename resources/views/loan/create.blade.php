<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>
@extends('layouts.app')
@section('content')

@include('layouts.errors')
<div class="panel panel-default" >
  <div class="panel-heading">Créer un prêt</div>
  <div class="panel-body">
    <div class="col-sm-4 col-md-4" style="padding-left : 30px;">
      <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">Prêt</div>
          <div class="panel-body">
            {!! Form::open(['route' => 'loan.store']) !!}

            @include('loan.form_create')

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-8 col-md-8" style="padding-left : 30px;">
      <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">Choisissez un patient</div>
          <div class="panel-body">
            <div class="container" style="width: 100%;" >
              <button class="btn-success btn-sm" id="btn-add"><i class="fa fa-plus-circle"></i> Ajouter un patient</button><br/><br/>
              <div class="alert alert-danger info" style="display:none;">
                <ul></ul>
              </div>
              <div class="row">
                <table id="example" class="display nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Numero de patient</th>

                    </tr>
                  </thead>
                  <tbody id="patient-list" name="patient-list">
                    @foreach($patient as $patients)
                    <tr id="patient{{ $patients->id }}">
                      <td>{{ $patients->reference }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
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
