
<div class="form-group">
  {!! Form::label('patient', 'N° du patient', []) !!}
  {!! Form::text('patient', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('date_start', 'Date de début', []) !!}
  {!! Form::text('date_start', null, ['class'=>'form-control']) !!}
</div>

</script>
<div class="form-group">
  {!! Form::label('date_end', 'Date de fin', []) !!}
  {!! Form::text('date_end', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('created_by', Auth::user()->name) !!}
</div>



{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
