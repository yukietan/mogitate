<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function show($productId)
    {
        $product = Product::find($productId);
        return view('products.show', compact('product'));
    }

    public function update(ProductRequest $request, $productId)
    {
        $product = Product::find($productId);
        $validatedData = $request->validated();

        $product->name        = $validatedData['name'];
        $product->price       = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->seasons     = implode(',', $validatedData['seasons']);

        if ($request->hasFile('image')) {
            // 既存画像の削除処理がある場合はここに記述
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/products'), $fileName);
            $product->image = 'storage/products/' . $fileName;
        }

        $product->save();

        return redirect()->route('products.show');
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        $product              = new Product();
        $product->name        = $validatedData['name'];
        $product->price       = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->seasons     = implode(',', $validatedData['seasons']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = 'storage/' . $path;
        }

        $product->save();

        return redirect()->route('products.index');
    }
}