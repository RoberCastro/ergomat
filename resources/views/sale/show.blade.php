@extends('layouts.app')

@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">Ma vente
      @can('edit', $sale)
        | <a href="{{ route('sale.edit', $sale->id) }}">Modifier</a>
      @endcan
    </div>

    <div class="panel-body">
      <h2>Id de la vente : {{ $sale->id }}</h2>

      <p>Date de fin :
        {{ Carbon\Carbon::parse($sale->date_sale)->format('d-M-Y')  }}
      </p>
      <p>Crée par :
        {{ $sale->created_by }}
      </p>
      <p>Modifié par :
        {{ $sale->modified_by }} en: {{ Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y')  }}
      </p>
      <hr>
      <div class="row">
        <div class="col-md-6 text-right">
          {{ $sale->created_at->format('l jS \\of F Y') }}
        </div>
      </div>

    </div>

  </div>
@endsection
