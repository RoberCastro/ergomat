@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Tous les patients</div>

    <div class="panel-body">
      @if($patients->isEmpty())
        <p>Vous n'avez pas encore d'patient.</p>
      @else
        <table class="table table-hover">
          <thead>
            <tr>
              <th>N° de référence</th>
              <th>Ergothérapeute</th>
              <th>Suprimmer?</th>
            </tr>
          </thead>
          <tbody>
            @foreach($patients as $patient)
              <tr>
                <td><a href="{{ route('patient.show', $patient->id) }}">{{ $patient->reference }}</a></td>
                <td><a href="{{ route('patient.show', $patient->id) }}">{{ $patient->user_id }}</a></td>
                <td>
                  <!-- Attention il faut travailler les authorisations comme dans l'example du prof -->
                  {!! Form::open(['url' => route('patient.destroy', $patient->id), 'method' => 'delete']) !!}
                  <button type="submit" class="btn btn-danger btn-xs">Supprimer</button>
                  {!! Form::close() !!}

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      <a href="{{ route('patient.create') }}" class="btn btn-info">Créer un patient</a>
    </div>
  </div>
</div>
@endsection
