<h2>Id de la vente : {{ $sale->id }}</h2>

<p>Date de début :
    {{ Carbon\Carbon::parse($sale->date_sale)->format('d-M-Y') }}
</p>

<p>Crée par :
    {{ $sale->created_by }}
    // Pour le patient n° : {{ $sale->patient->reference }}
</p>

<p>Modifié par :
    {{ $sale->modified_by }} en: {{ Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y')  }}
</p>

<p>
    <strong>Products:</strong>
    <ul>
        @foreach($sale->products as $product)
        <li>{{ $product->name }} - Qté : {{ $product->pivot->quantity_sale }} - Prix : {{ $product->price }}</li>
        @endforeach
    </ul>
</p>
