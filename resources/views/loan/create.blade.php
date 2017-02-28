@extends('layouts.app')

@section('content')

        @include('layouts.errors')
        <div class="panel panel-default" style=" max-width: 300px; min-height: 415px">
            <div class="panel-heading">Créer un prêt</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'loan.store']) !!}

                @include('loan.form_create')

                {!! Form::close() !!}
            </div>
        </div>
@endsection
