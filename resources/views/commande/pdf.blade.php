<h2>Id de la commande : {{ $commande->id }}</h2>

<p>Date de début :
    {{ Carbon\Carbon::parse($commande->date_commande)->format('d-M-Y') }}
</p>

<p>Crée par :
    {{ $commande->created_by }}
</p>

<p>Modifié par :
    {{ $commande->modified_by }} en: {{ Carbon\Carbon::parse($commande->updated_at)->format('d-M-Y')  }}
</p>

<p>
    <strong>Products:</strong>
    <ul>
        @foreach($commande->products as $product)
        <li>{{ $product->name }} - Qté : {{ $product->pivot->quantity_comm }} - Prix : {{ $product->price }}</li>
        @endforeach
    </ul>
</p>
