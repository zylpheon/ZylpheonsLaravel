<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductModal extends Component
{
    public $showModal = false;
    public $product = null;
    public $quantity = 1;

    protected $listeners = ['openProductModal'];

    public function openProductModal($productId)
    {
        $this->product = Product::find($productId);
        $this->quantity = 1;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->product = null;
        $this->quantity = 1;
    }

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCartAndClose()
    {
        if ($this->product) {
            $cart = session()->get('cart', []);

            if (isset($cart[$this->product->id])) {
                $cart[$this->product->id] += $this->quantity;
            } else {
                $cart[$this->product->id] = $this->quantity;
            }

            session()->put('cart', $cart);

            $this->dispatch('cart-updated');
            $this->dispatch('cartUpdated');
            $this->closeModal();

            // Optional: Show success message
            $this->dispatch('notify', message: "{$this->quantity} item(s) added to cart!");
        }
    }

    public function viewDetails()
    {
        // This could navigate to a dedicated product page
        // For now, we'll keep the modal open
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}