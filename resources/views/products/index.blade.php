@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>Tutti i prodotti</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success">Aggiungi un nuovo prodotto</a>
    <table class="table mt-3">
  <thead>
    <tr>
      <th >id</th>
      <th >Nome</th>
      <th >Descrizione</th>
      <th >Prezzo</th>
      <th >Azioni</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($products as $product)
      <tr>
        <th >{{ $product->id}}</th>
        <td>{{ $product->name}}</td>
        <td>{{ $product->description}}</td>
        <td>{{ $product->price}}</td>
        <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Visualizza</a></td>
        <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Modifica</a></td>
        <td>
          <form class="" action="{{ route('products.destroy', $product->id) }}" method="post">
            @method ('DELETE')
            @csrf
            <input class="btn btn-danger" type="submit" name="" value="Elimina">
          </form>
        </td>
      </tr>

    @empty
      <p>Non ci sono prodotti</p>
    @endforelse

  </tbody>
</table>

  </div>
@endsection
