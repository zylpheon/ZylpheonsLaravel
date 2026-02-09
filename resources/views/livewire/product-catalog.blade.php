<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCatalog extends Component
{
    public $categoryFilter = 'all';
    public $priceFilter = 'all';
    public $searchQuery = '';

    public function render()
    {
        $query = Product::query();

        // Category filter
        if ($this->categoryFilter !== 'all') {
            $query->where('category', $this->categoryFilter);
        }

        // Price filter
        if ($this->priceFilter !== 'all') {
            if ($this->priceFilter === '0-200') {
                $query->where('price', '<', 200000);
            } elseif ($this->priceFilter === '200-500') {
                $query->whereBetween('price', [200000, 500000]);
            } elseif ($this->priceFilter === '500+') {
                $query->where('price', '>=', 500000);
            }
        }

        // Search filter
        if (!empty($this->searchQuery)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('category', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $this->searchQuery . '%');
            });
        }

        $products = $query->get();

        return view('livewire.product-catalog', [
            'products' => $products
        ]);
    }

    public function addToCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]++;
        } else {
            $cart[$productId] = 1;
        }

        session()->put('cart', $cart);

        // Dispatch events
        $this->dispatch('cart-updated');
        $this->dispatch('cartUpdated');
    }

    public function updatedCategoryFilter()
    {
        // Auto-refresh when filter changes
    }

    public function updatedPriceFilter()
    {
        // Auto-refresh when filter changes
    }

    public function updatedSearchQuery()
    {
        // Auto-refresh when search changes
    }
}