@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Ma commande
      @can('edit', $commande)
        | <a href="{{ route('commande.edit', $commande->id) }}">Modifier</a>
      @endcan
    </div>

    <div class="panel-body">
      <h2>Id de la commande : {{ $commande->id }}</h2>

      <p>Date de fin :
        {{ Carbon\Carbon::parse($commande->date_commande)->format('d-M-Y')  }}
      </p>
      <p>Crée par :
        {{ $commande->created_by }}
      </p>
      <p>Modifié par :
        {{ $commande->modified_by }} en: {{ Carbon\Carbon::parse($commande->updated_at)->format('d-M-Y')  }}
      </p>
      <hr>
      <div class="row">
        <div class="col-md-6 text-right">
          {{ $commande->created_at->format('l jS \\of F Y') }}
        </div>
      </div>

    </div>

  </div>
@endsection
