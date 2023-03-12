<?php

namespace App\Adapters;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

trait CacheProductsAdapter
{
    public function updateCache(string $productsType): void
    {
        if ($productsType === 'products') {
            Cache::forget($productsType);
            Cache::forever(
                $productsType,
                $this->query('product')
            );
        }

        if ($productsType === 'productsTrash') {
            Cache::forget($productsType);
            Cache::forever(
                $productsType,
                $this->query('product')
            );
        }
    }

    public function getCacheOrCreate(string $productsType): Collection
    {
        if ($productsType === 'products') {
            if (Cache::has($productsType)) {
                $products = Cache::get($productsType);
            } else {
                $products = $this->query($productsType);
                Cache::put('products', $products);
            }
        }

        if ($productsType === 'productsTrash') {
            if (Cache::has($productsType)) {
                $products = Cache::get($productsType);
            } else {
                $products = $this->query($productsType);
                Cache::put('products', $products);
            }
        }

        return $products;
    }

    private function query(string $productsType): Collection
    {
        if ($productsType === 'products') {
            $product = Product::select('id', 'name', 'description', 'category_id')
                ->with(['category' => fn ($query) => $query->select('id', 'name')])
                ->get();
        }

        if ($productsType === 'productsTrash') {

            $product = Product::withTrashed()
                ->select('id', 'name', 'description', 'category_id')
                ->whereNotNull('deleted_at')
                ->with(['category' => fn ($query) => $query->select('id', 'name')])
                ->get();
        }

        return $product;
    }
}
