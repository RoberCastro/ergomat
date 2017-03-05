
<div class="form-group">
	{!! Form::label('name', 'Name', []) !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}

</div>


<div class="row" style="padding-bottom:20px;">
	<div  class="col-sm-6 col-md-6">
		{!! Form::label('side', 'Side', []) !!}
		{!! Form::text('side', null, ['class'=>'form-control']) !!}
	</div>
	<div class="col-sm-6 col-md-6">
		{!! Form::label('quantity', 'Quantité', []) !!}
		{!! Form::text('quantity', null, ['class'=>'form-control']) !!}
	</div>
</div>

<div class="row"></div>

<div class="row" style="padding-bottom:20px;">
	<div  class="col-sm-6 col-md-6">
		{!! Form::label('price', 'Prix', []) !!}
		{!! Form::text('price', null, ['class'=>'form-control']) !!}
	</div>
	<div class="col-sm-6 col-md-6">
		{!! Form::label('pro_date_status', 'Date du status', []) !!}
		{!! Form::date('pro_date_status', null, ['class'=>'form-control']) !!}
	</div>
</div>



<div class="form-group">
	{!! Form::label('description', 'Drescription') !!}
	{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>



{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
