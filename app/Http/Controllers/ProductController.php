<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // return Product::all();
        $products = Product::orderBy('pid')->paginate(10);
        return view('products.index', compact("products"));
    }

    public function show(int $pid)
    {
        $product = Product::findOrFail($pid);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        // return "this is create method";
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'in_stock' => 'required|boolean'
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created');
    }

    public function edit(int $pid)
    {
        // return "<h1>this is edit</h1>";

        $product = Product::findOrFail($pid);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, int $pid)
    {
        $product = Product::findOrFail($pid);
        $request->validate([
            'title' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'in_stock' => 'required|boolean'
        ]);

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    public function destroy(int $id)
    {
        $student = Product::findOrFail($id);
        $student->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}
