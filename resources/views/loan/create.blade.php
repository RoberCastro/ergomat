@extends('layouts.app')

@section('content')
    <div class="panel panel-default">

        @include('layouts.errors')
        <div class="panel panel-default">
            <div class="panel-heading">Créer un prêt</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'loan.store']) !!}

                @include('loan.form_create')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
