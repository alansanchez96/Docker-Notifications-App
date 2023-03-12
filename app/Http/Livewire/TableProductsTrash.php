<?php

namespace App\Http\Livewire;

use App\Classes\Facades\CacheComposite;
use App\Models\Product;
use Livewire\Component;

class TableProductsTrash extends Component
{
    public $products, $categories, $categoryFilter, $searchProduct, $search;

    protected $listeners = [
        'reset' => 'resetFilters',
        'refreshProductList' => '$refresh'
    ];

    public function resetFilters()
    {
        $this->reset(['categoryFilter', 'searchProduct']);
    }

    public function search()
    {
        $this->render();
    }

    

    public function restoreProduct($productId)
    {
        Product::withTrashed()->findOrFail($productId)->restore();

        CacheComposite::updateCache(
            Product::class,
            'products',
            ['id', 'name', 'description', 'category_id']
        );

        $this->emit('productRestored');
    }

    public function forceDeleteProduct($productId)
    {
        Product::onlyTrashed()->findOrFail($productId)->forceDelete();

        CacheComposite::updateCache(
            Product::class,
            'products',
            ['id', 'name', 'description', 'category_id']
        );

        $this->emit('productForceDeleted');
    }

    public function render()
    {
        $this->products = Product::withTrashed()
            ->select('id', 'name', 'description', 'category_id')
            ->whereNotNull('deleted_at')
            ->with(['category' => fn ($query) => $query->select('id', 'name')])
            ->when($this->categoryFilter, fn ($query) => $query->where('category_id', $this->categoryFilter))
            ->when($this->searchProduct, fn ($query) => $query->where('name', 'like', '%' . $this->searchProduct . '%'))
            ->get();

        return view('livewire.table-products-trash', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);
    }
}
