<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCatalog extends Component
{
    public $categoryFilter = 'all';
    public $priceFilter = 'all';
    public $searchQuery = '';
    public $sortBy = 'newest'; // newest, price_low, price_high, name_asc, name_desc

    public function render()
    {
        $query = Product::query();

        // Search filter
        if (!empty($this->searchQuery)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('category', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('description', 'like', '%' . $this->searchQuery . '%')
                    ->orWhere('badge', 'like', '%' . $this->searchQuery . '%');
            });
        }

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

        // Sorting
        switch ($this->sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
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

        // Dispatch events to update cart
        $this->dispatch('cart-updated');
        $this->dispatch('cartUpdated');

        // Optional: Show notification
        $this->dispatch('notify', message: 'Product added to cart!');
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

    public function updatedSortBy()
    {
        // Auto-refresh when sorting changes
    }

    public function resetFilters()
    {
        $this->categoryFilter = 'all';
        $this->priceFilter = 'all';
        $this->searchQuery = '';
        $this->sortBy = 'newest';
    }
}