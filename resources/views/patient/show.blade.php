@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Mon patient
        <a href="{{ route('patient.edit', $patient->id) }}">Modifier</a>
    </div>

    <div class="panel-body">
      <h2>{{ $patient->reference }}</h2>
      <p>
        {{ $patient->user_id }}
      </p>
      <hr>
      <div class="row">
        <div class="col-md-6 text-right">
          {{ $patient->created_at->format('l jS \\of F Y') }}
        </div>
      </div>
    </div>
  </div>
@endsection
