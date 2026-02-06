<div>
    <!-- Cart Badge (for navigation) -->
    @if(isset($showBadge) && $showBadge && $this->totalItems > 0)
        <span class="cart-badge">{{ $this->totalItems }}</span>
    @endif

    <!-- Cart Sidebar -->
    <div class="cart-sidebar {{ $showCart ? 'active' : '' }}" wire:ignore.self>
        <div class="h-full flex flex-col">
            <div class="flex items-center justify-between p-6 border-b border-zinc-100">
                <h3 class="text-xl font-semibold">Shopping Cart</h3>
                <button wire:click="toggle" class="text-zinc-400 hover:text-zinc-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto p-6">
                @if(count($cartItems) === 0)
                    <p class="text-center text-zinc-400 py-12">Your cart is empty</p>
                @else
                    @foreach($cartItems as $item)
                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="{{ asset($item['product']->image) }}" alt="{{ $item['product']->name }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                            <div class="cart-item-info">
                                <div class="cart-item-name">{{ $item['product']->name }}</div>
                                <div class="cart-item-price">${{ number_format($item['product']->price, 0) }}</div>
                            </div>
                            <button wire:click="removeFromCart({{ $item['product']->id }})" class="cart-item-remove">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="border-t border-zinc-100 p-6">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-zinc-600">Subtotal</span>
                    <span class="text-xl font-semibold">${{ number_format($this->subtotal, 0) }}</span>
                </div>
                <a href="#contact"
                    wire:click="toggle"
                    class="w-full bg-zinc-900 text-white py-4 rounded-xl font-medium hover:bg-zinc-800 transition-colors block text-center">
                    Contact Dealer
                </a>
            </div>
        </div>
    </div>
</div>

@script
<script>
    // Listen for cart updates
    Livewire.on('cart-updated', () => {
        $wire.loadCart();
    });

    // Listen for add to cart from product catalog
    Livewire.on('addToCart', (event) => {
        $wire.addToCart(event.productId);
    });
</script>
@endscript
