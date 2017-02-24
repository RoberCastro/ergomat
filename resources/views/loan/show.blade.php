@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Mon prêt
      @can('edit', $loan)
        | <a href="{{ route('loan.edit', $loan->id) }}">Modifier</a>
      @endcan
    </div>

    <div class="panel-body">
      <h2>{{ $loan->id }}</h2>
      <p>
        {{ $loan->date_start }}
      </p>
      <hr>
      <div class="row">
        <div class="col-md-6 text-right">
          {{ $loan->created_at->format('l jS \\of F Y') }}
        </div>
      </div>

    </div>
    
  </div>
@endsection
