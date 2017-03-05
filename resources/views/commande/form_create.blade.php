

<div  class="col-sm-6 col-md-6">
  {!! Form::label('price', 'Prix', []) !!}
  {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('date_commande', 'Date de la commande', []) !!}
  {!! Form::date('date_commande', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
  {!! Form::label('created_by', Auth::user()->name) !!}
</div>


{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
