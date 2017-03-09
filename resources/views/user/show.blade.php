@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Mon Profil
  </div>

  <div class="panel-body">
    <h2>{{ $user->name }}</h2>
    <p>
      {{ $user->email }}
    </p>
    <hr>
    <div class="row">
      <div class="col-md-6 text-right">
        {{ $user->created_at->format('l jS \\of F Y') }}
      </div>
    </div>

  </div>
</div>
@if(Auth::user()->isadmin)
<div class="panel panel-default">
  <div class="panel-heading">Tous les users</div>

  <div class="panel-body">
    @if($users->isEmpty())
    <p>Vous n'avez pas encore d'product.</p>
    @else
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td><a href="{{ route('user.show', $user->id) }}">{{ $user->id }}</a></td>
          <td><p>{{ $user->name }}</p></td>
          <td><p>{{ $user->email }}</p></td>

        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    <!-- <a href="{{ route('product.create') }}" class="btn btn-info">Créer un product</a> -->
  </div>
</div>
@endif

@endsection
