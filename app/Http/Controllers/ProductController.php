<?php

namespace App\Http\Controllers;

use App\Adapters\CacheAdapter;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Events\CreatedProductEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    use CacheAdapter;

    public function index()
    {
        if (Cache::has('products')) {
            $products = Cache::get('products');
        } else {
            $products = $this->cacheProducts();
            Cache::put('products', $products);
        }

        $categories = Category::select('id', 'name')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        event(new CreatedProductEvent($product, auth()->user()));

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        $this->cacheProducts();

        return redirect()->route('product.index');
    }

    public function forceDelete($id)
    {
        Product::onlyTrashed()->findOrFail($id)->forceDelete();

        $this->cacheProducts();

        return redirect()->route('product.index');
    }

    public function trash()
    {
        $products = Product::withTrashed()
            ->select('id', 'name', 'description', 'category_id')
            ->whereNotNull('deleted_at')
            ->with(['category' => fn ($query) => $query->select('id', 'name')])
            ->get();

        $categories = Category::select('id', 'name')->get();

        return view('products.trash', compact('products', 'categories'));
    }

    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();

        $this->cacheProducts();

        return redirect()->route('product.index');
    }
}
