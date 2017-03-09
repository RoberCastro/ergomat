<h2>Id du prêt : {{ $loan->id }}</h2>

<p>Date de début :
    {{ Carbon\Carbon::parse($loan->date_start)->format('d-M-Y') }}
</p>

<p>Date de fin :
    {{ Carbon\Carbon::parse($loan->date_end)->format('d-M-Y')  }}
</p>

<p>Crée par :
    {{ $loan->created_by }}
    // Pour le patient n° : {{ $loan->patient->reference }}
</p>

<p>Modifié par :
    {{ $loan->modified_by }} en: {{ Carbon\Carbon::parse($loan->updated_at)->format('d-M-Y')  }}
</p>

<p>
    <strong>Products:</strong>
    <ul>
        @foreach($loan->products as $product)
        <li>{{ $product->name }} - Qté : {{ $product->pivot->quantity_loan }} - Prix : {{ $product->price }}</li>
        @endforeach
    </ul>
</p>
