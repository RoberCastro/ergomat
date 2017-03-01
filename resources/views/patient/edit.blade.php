@extends('layouts.app')

@section('content')
    <div class="panel panel-default">

        @include('layouts.errors')
        <div class="panel panel-default">
            <div class="panel-heading">Créer un patient</div>
            <div class="panel-body">
              {!! Form::model($patient, ['method' => 'PATCH', 'route' => ['patient.update', $patient->id]]) !!}

                @include('patient.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
