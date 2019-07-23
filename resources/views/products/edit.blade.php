@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>Modifica le caratteristiche del prodotto</h1>
    <form method="post" action="{{ route('products.update', $product->id) }}">
      {{-- per il file edit non posso utilizzare PUT come richiesto dalla route list
      perchè nel form posso passare solo post e get allora scrivo --}}
      @method ('PUT')
      {{-- per passare i dati devo inserire token che si aggiunge al form si mette anche nelle chiamate ajax--}}
      @csrf
    <div class="form-group">
      <label for="name">Nome prodotto</label>
      <input type="text" class="form-control" name="name" placeholder="Inserisci il nome" value="{{ old('name', $product->name) }}">
      @error ('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="description">Descrizione prodotto</label>
      <textarea name="description" class="form-control" placeholder="Inserisci la descrizione" rows="8" cols="80">{{ old('description', $product->description) }}</textarea>
      @error ('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Prezzo prodotto</label>
      <input type="text" class="form-control" name="price" placeholder="Inserisci il prezzo" value="{{ old('price', $product->price) }}">
      @error ('price')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>

@endsection
