<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductModal extends Component
{
    public $showModal = false;
    public $product = null;

    protected $listeners = ['openProductModal'];

    public function openProductModal($productId)
    {
        $this->product = Product::find($productId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->product = null;
    }

    public function addToCartAndClose()
    {
        if ($this->product) {
            $cart = session()->get('cart', []);
            
            if (isset($cart[$this->product->id])) {
                $cart[$this->product->id]++;
            } else {
                $cart[$this->product->id] = 1;
            }
            
            session()->put('cart', $cart);
            
            $this->dispatch('cart-updated');
            $this->dispatch('cartUpdated');
            $this->closeModal();
        }
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}
