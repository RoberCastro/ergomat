@extends('layouts.app')

@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">Tous les prêts</div>

    <div class="panel-body">
      @if($loans->isEmpty())
        <p>Vous n'avez pas encore de prêts.</p>
      @else
        <div class="container" style="width: 100%;" >
          <div class="alert alert-danger info" style="display:none;">
            <ul></ul>
          </div>
          <div class="row table-responsive">
            <table id="table_loan" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date de start</th>
                    <th>Date de fin</th>
                    <th>Option</th>
                  </tr>
                </tr>
              </thead>
              <tbody id="loan-list" name="loan-list">

                @foreach($loans as $loan)
                  <tr>
                    <td><a href="{{ route('loan.show', $loan->id) }}">{{ $loan->id }}</a></td>
                    <td><p>{{ $loan->patient->reference }}</p></td>
                    <td><p>{{ $loan->date_start }}</p></td>
                    <td><p>{{ $loan->date_end }}</p></td>
                    <td>
                      <a role="button" class="btn btn-info" href="{{ route('loan.show', $loan->id) }}">Voir</a>
                    </td>
                  </tr>
                @endforeach


              </tbody>
            </table>
          @endif
          <a href="{{ route('loan.create') }}" class="btn btn-info">Créer un Prêt</a>
        </div>
      </div>
    </div>
  </div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#table_loan').DataTable();
});
</script>
