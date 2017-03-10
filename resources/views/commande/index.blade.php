
@extends('layouts.app')

@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">Tous les commandes</div>

    <div class="panel-body">
      @if($commandes->isEmpty())
        <p>Vous n'avez pas encore de Commandes.</p>
      @else
        <div class="container" style="width: 100%;" >
          <div class="alert alert-danger info" style="display:none;">
            <ul></ul>
          </div>
          <div class="row table-responsive">
            <table id="table_commande" class="display nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <tr>
                    <th>ID</th>
                    <th>Date de la commande</th>
                    <th>Prix</th>
                    <th>Option</th>
                  </tr>
                </tr>
              </thead>
              <tbody id="commande-list" name="commande-list">

                @foreach($commandes as $commande)
                  <tr>
                    <td><a href="{{ route('commande.show', $commande->id) }}">{{ $commande->id }}</a></td>
                    <td><p>{{ $commande->date_commande }}</p></td>
                    <td><p>{{ $commande->price }}</p></td>
                    <td>
                        <a role="button" class="btn btn-info" href="{{ route('commande.show', $commande->id) }}">Voir</a>
                    </td>
                  </tr>
                @endforeach


              </tbody>
            </table>
          @endif
          <a href="{{ route('commande.create') }}" class="btn btn-info">Créer un Prêt</a>
        </div>
      </div>
    </div>
  </div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#table_commande').DataTable();
});
</script>
