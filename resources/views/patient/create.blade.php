@extends('layouts.app')

@section('content')
    <div class="panel panel-default">

        @include('layouts.errors')
        <div class="panel panel-default">
            <div class="panel-heading">Nouveau patient</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'patient.store']) !!}

                @include('patient.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
