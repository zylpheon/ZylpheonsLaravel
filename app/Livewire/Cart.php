<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $cartItems = [];
    public $showCart = false;

    protected $listeners = ['cartUpdated' => 'loadCart', 'toggleCart' => 'toggle'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $cart = session()->get('cart', []);
        $this->cartItems = [];
        
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $this->cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity
                ];
            }
        }
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
        $this->loadCart();
        
        $this->dispatch('cart-updated');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);
        
        $this->loadCart();
        $this->dispatch('cart-updated');
    }

    public function toggle()
    {
        $this->showCart = !$this->showCart;
    }

    public function getSubtotalProperty()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item['product']->price * $item['quantity'];
        }
        return $total;
    }

    public function getTotalItemsProperty()
    {
        $total = 0;
        foreach ($this->cartItems as $item) {
            $total += $item['quantity'];
        }
        return $total;
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
