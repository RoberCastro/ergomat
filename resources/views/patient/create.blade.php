@extends('layouts.app')

@section('content')
        @include('layouts.errors')
        <div class="panel panel-default">
            <div class="panel-heading">Nouveau patient</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'patient.store']) !!}

                @include('patient.form')

                {!! Form::close() !!}
            </div>
        </div>
@endsection
