
<div class="form-group">
	{!! Form::label('name', 'Name', []) !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('side', 'Side', []) !!}
	{!! Form::text('side', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('price', 'Price', []) !!}
	{!! Form::text('price', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('pro_date_status', 'Date du status', []) !!}
	{!! Form::text('pro_date_status', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
	{!! Form::label('description', 'Drescription') !!}
	{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>



{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}