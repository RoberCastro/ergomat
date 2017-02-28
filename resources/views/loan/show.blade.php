@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Mon prêt
      @can('edit', $loan)
        | <a href="{{ route('loan.edit', $loan->id) }}">Modifier</a>
      @endcan
    </div>

    <div class="panel-body">
      <h2>Id du prêt : {{ $loan->id }}</h2>
      <p>Date de début :
        {{ Carbon\Carbon::parse($loan->date_start)->format('d-M-Y') }}
      </p>
      <p>Date de fin :
        {{ Carbon\Carbon::parse($loan->date_end)->format('d-M-Y')  }}
      </p>
      <p>Crée par :
        {{ $loan->created_by }}
      </p>
      <p>Modifié par :
        {{ $loan->modified_by }} en: {{ Carbon\Carbon::parse($loan->updated_at)->format('d-M-Y')  }}
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
