<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'categorie' => 'required',
            'prijs' => 'required|numeric',
            'voorraadaantal' => 'required|numeric',
            'vervaldatum' => 'required|date',
        ]);

        $product = Product::create([
            'naam' => $request->naam,
            'categorie' => $request->categorie,
            'prijs' => $request->prijs,
            'voorraadaantal' => $request->voorraadaantal,
            'vervaldatum' => $request->vervaldatum,
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'naam' => 'required',
            'categorie' => 'required',
            'prijs' => 'required|numeric',
            'voorraadaantal' => 'required|numeric',
            'vervaldatum' => 'required|date',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['success' => true]);
    }
}
