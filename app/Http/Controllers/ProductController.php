<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Events\CreatedProductEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        event(new CreatedProductEvent($product));

        return redirect()->route('welcome')->with('create', 'El producto se ha creado correctamente');
    }
}
