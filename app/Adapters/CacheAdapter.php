<?php

namespace App\Adapters;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

trait CacheAdapter
{
    public function cacheProducts()
    {
        Cache::forget('products');
        Cache::forever(
            'products',
            Product::select('id', 'name', 'description', 'category_id')
                ->with(['category' => fn ($query) => $query->select('id', 'name')])
                ->get()
        );
    }
}
