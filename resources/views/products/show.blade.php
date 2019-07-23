@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>Prodotto: {{ $product->id }}</h1>
    <ul>
      <li>Nome: {{ $product->name }}</li>
      <li>Descrizione: {{ $product->description }}</li>
      <li>Prezzo: {{ $product->price }}</li>
    </ul>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Torna alla Lista Prodotti</a>
  </div>
@endsection
