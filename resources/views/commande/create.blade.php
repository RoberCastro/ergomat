
@extends('layouts.app')
@section('content')

  @include('layouts.errors')
  <div class="panel panel-default" >
    <div class="panel-heading">Créer une commande</div>
    <div class="panel-body">
      <div class="col-sm-4 col-md-4" style="padding-left : 30px;">
        <div class="row">
          <div class="panel panel-default" >
            <div class="panel-heading">Commande</div>
            <div class="panel-body">
              {!! Form::open(['route' => 'commande.store']) !!}

              @include('commande.form_create')

              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
