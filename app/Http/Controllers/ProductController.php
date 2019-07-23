<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct() {
      //se metto middleware nel costruttore allora mi applica middleware
      //a tutte le funzioni del costruttore
      //view_product e edit_product sono i nomi dentro la colonna name
      //nella tabella permissions del databse
      $this->middleware('permission:view_product');
      //puoi fare edit di tutte le funzioni tranne index e show
      $this->middleware('permission:edit_product')->except(['index', 'show']);
    }

    public function index()
    {
      $products = Product::all();
      $data = [
        'products'=> $products
      ];
      return view('products.index', $data);
    }


    public function create()
    {
      return view('products.create');
    }


    public function store(Request $request)
    {
      // validazione dei dati in ingresso
      $validatedData = $request->validate([
        'name' => 'required|max:255|bail',
        'description' => 'required',
        'price' => 'required|numeric|between:0,9999.9',
      ]);

      //dd($request->all());

      //prendo dati dal form
      $dati = $request->all();

      //dd($dati);
      //creo nuovo oggetto
      $nuovo_prodotto = new Product();
      //oppure
      //$nuovo_prodotto->name = $dati['name'];
      //etc.. con tutti
      //compila l'ggeto con questi dati
      $nuovo_prodotto->fill($dati);
      $nuovo_prodotto->save();

      //se inserisco il file store.blade.php allora
      //retur view('store');
      //ma è meglio non inserirlo
      return redirect()->route('products.index');
    }

    public function show($id)
    {
      //dd($id);
      // in show(Product $variabile)
      //se cancello Product

      //recupero id prodotto che sta arrivando
      $product = Product::find($id);
      if (empty($product)) {
        abort(404);
      }
      // $data =[
      //   'product'=> $product
      // ];
      return view('products.show', compact('product'));
    }


    public function edit($id)
    {
      //uguale a Show
      //recupero id
      $product = Product::find($id);
      if (empty($product)) {
        abort(404);
      }
      $data =[
        'product'=> $product
      ];
      return view('products.edit', $data);
    }


    public function update(Request $request, $id)
    {
      // validazione dei dati in ingresso
      $validatedData = $request->validate([
        'name' => 'required|max:255|bail',
        'description' => 'required',
        'price' => 'required|numeric|between:0,9999.9',
      ]);

      //dd($request->all());
      //prendo i dati dal form
      $dati = $request->all();
      //recupero id dal model
      $prodotto = Product::find($id);
      //salvo
      $prodotto->update($dati);

      return redirect()->route('products.index');
    }


    public function destroy($id)
    {
      //recupero id
      $prodotto = Product::find($id);
      $prodotto->delete();

      return redirect()->route('products.index');
    }
}
