<div class="form-group">
    {!! Form::label('name', 'Nom', []) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}

</div>


<div class="row" style="padding-bottom:20px;">
    <div class="col-sm-6 col-md-6">
        {!! Form::label('price', 'Prix', []) !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>
    <div class="col-sm-6 col-md-6">
        {!! Form::label('side', 'Côté', []) !!}
        {{ Form::select('side', [
       'droit' => 'Droit',
       'gauche' => 'Gauche',
       'aucun' => 'Aucun'], null, ['class' => 'form-control']
        )}}
    </div>

</div>

<div class="panel panel-default">
    <div class="panel-heading">Quantités en stock</div>
    <div class="panel-body">

        <div class="row" style="padding-bottom:20px;">
            <div class="col-sm-4 col-md-4">
                {!! Form::label('available', 'Disponible', []) !!}
                {!! Form::number('available', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4 col-md-4">
                {!! Form::label('loaned', 'Prêté', []) !!}
                {!! Form::number('loaned', 0, ['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4 col-md-4">
                {!! Form::label('reparation', 'En réparation', []) !!}
                {!! Form::number('reparation', 0, ['class'=>'form-control']) !!}
            </div>
        </div>


        <div class="row" style="padding-bottom:20px;">
            <div class="col-sm-4 col-md-4">
                {!! Form::label('quantity', 'Quantité', []) !!}
                {!! Form::number('quantity', 0, ['class'=>'form-control']) !!}
            </div>
            <div class="col-sm-4 col-md-4">
                {!! Form::label('total', 'Total', []) !!}
                {!! Form::number('total', 0, array( 'readonly' , 'class'=>'form-control')) !!}
            </div>
            <div class="col-sm-4 col-md-4">
                {!! Form::label('ordered', 'Commandés', []) !!}
                {!! Form::number('ordered', 0, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</div>


<div class="row"></div>

{{--<div class="row" style="padding-bottom:20px;">

	<div class="col-sm-6 col-md-6">
		{!! Form::label('pro_date_status', 'Date du status', []) !!}
		{!! Form::date('pro_date_status', null, ['class'=>'form-control']) !!}
	</div>
</div>--}}


<div class="form-group">
    {!! Form::label('description', 'Drescription') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>


{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
