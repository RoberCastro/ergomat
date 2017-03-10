@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">Tous les patients</div>

    <div class="panel-body">
      @if($patients->isEmpty())
        <p>Vous n'avez pas encore d'patient.</p>
      @else

        <table id="table_patient" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>N° de référence</th>
              <th>Ergothérapeute</th>
            </tr>
          </thead>
          <tbody id="patient-list" name="patient-list">

            @foreach($patients as $patient)
            <tr>
              <td><a href="{{ route('patient.show', $patient->id) }}">{{ $patient->reference }}</a></td>
              <td><a href="{{ route('user.show', $patient->user->id) }}">{{ $patient->user->name }}</a></td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#table_patient').DataTable();
});
</script>
