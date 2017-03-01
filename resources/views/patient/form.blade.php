
<div class="form-group">
	{!! Form::label('reference', 'N° de référence du patient', []) !!}
	{!! Form::text('reference', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
	{!! Form::label('user_id', 'Id ergothérapeute', []) !!}
	{!! Form::text('user_id', $user->id, ['class' => 'form-control', 'id' => 'user_id']) !!}
</div>




{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
