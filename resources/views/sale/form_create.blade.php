
<div class="form-group">
  {!! Form::label('patient', 'N° du patient', []) !!}
  {!! Form::text('patient', null, ['id' => 'nopatient', 'class' => 'form-control']) !!}
</div>

<div  class="col-sm-6 col-md-6">
  {!! Form::label('price', 'Prix', []) !!}
  {!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('date_sale', 'Date de la vente', []) !!}
  {!! Form::date('date_sale', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
  {!! Form::label('created_by', Auth::user()->name) !!}
</div>


{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
