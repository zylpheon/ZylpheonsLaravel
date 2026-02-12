<div>
    <!-- Cart Badge (for navigation) -->
    @if(isset($showBadge) && $showBadge && $this->totalItems > 0)
        <span class="absolute -top-2 -right-2 cart-badge">{{ $this->totalItems }}</span>
    @endif

    <!-- Cart Sidebar -->
    <div class="cart-sidebar {{ $showCart ? 'active' : '' }}" wire:ignore.self>
        <div class="h-full flex flex-col">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-zinc-100">
                <div>
                    <h3 class="text-xl font-semibold">Shopping Cart</h3>
                    @if(count($cartItems) > 0)
                        <p class="text-sm text-zinc-500 mt-1">{{ $this->totalItems }}
                            {{ Str::plural('item', $this->totalItems) }}</p>
                    @endif
                </div>
                <button wire:click="toggle" class="text-zinc-400 hover:text-zinc-900 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Cart Items -->
            <div class="flex-1 overflow-y-auto p-6">
                @if(count($cartItems) === 0)
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-zinc-300 mb-4" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <p class="text-zinc-400 text-lg mb-2">Your cart is empty</p>
                        <p class="text-zinc-500 text-sm mb-4">Add some vehicles to get started</p>
                        <button wire:click="toggle" class="text-sm text-zinc-900 hover:underline">
                            Continue Shopping
                        </button>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($cartItems as $index => $item)
                            <div class="cart-item" wire:key="cart-item-{{ $item['product']->id }}">
                                <!-- Product Image -->
                                <div class="cart-item-image">
                                    <img src="{{ asset($item['product']->image) }}" alt="{{ $item['product']->name }}"
                                        class="w-full h-full object-cover rounded-lg">
                                </div>

                                <!-- Product Info -->
                                <div class="cart-item-info flex-1">
                                    <div class="cart-item-name">{{ $item['product']->name }}</div>
                                    <div class="text-xs text-zinc-500 mb-2">{{ ucfirst($item['product']->category) }}</div>
                                    <div class="cart-item-price font-semibold">
                                        ${{ number_format($item['product']->price, 0) }}
                                    </div>

                                    <!-- Quantity Controls -->
                                    <div class="flex items-center gap-2 mt-3">
                                        <button wire:click="decrementQuantity({{ $item['product']->id }})"
                                            class="w-7 h-7 flex items-center justify-center border border-zinc-300 rounded hover:bg-zinc-100 transition-colors"
                                            wire:loading.attr="disabled">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 12H4" />
                                            </svg>
                                        </button>

                                        <input type="number" value="{{ $item['quantity'] }}"
                                            wire:change="updateQuantity({{ $item['product']->id }}, $event.target.value)"
                                            min="1"
                                            class="w-12 h-7 text-center border border-zinc-300 rounded text-sm focus:outline-none focus:border-zinc-900">

                                        <button wire:click="incrementQuantity({{ $item['product']->id }})"
                                            class="w-7 h-7 flex items-center justify-center border border-zinc-300 rounded hover:bg-zinc-100 transition-colors"
                                            wire:loading.attr="disabled">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remove Button -->
                                <button wire:click="removeFromCart({{ $item['product']->id }})"
                                    class="cart-item-remove self-start" title="Remove from cart">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <!-- Clear Cart Button -->
                    @if(count($cartItems) > 0)
                        <button wire:click="clearCart" wire:confirm="Are you sure you want to clear your cart?"
                            class="mt-4 w-full text-sm text-red-600 hover:text-red-700 py-2 border border-red-200 rounded-lg hover:bg-red-50 transition-colors">
                            Clear Cart
                        </button>
                    @endif
                @endif
            </div>

            <!-- Footer / Checkout -->
            @if(count($cartItems) > 0)
                <div class="border-t border-zinc-100 p-6 bg-zinc-50">
                    <!-- Subtotal -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-zinc-600">Items ({{ $this->totalItems }})</span>
                            <span class="font-medium">${{ number_format($this->subtotal, 0) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-zinc-600">Estimated Tax</span>
                            <span class="font-medium">Calculated at checkout</span>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="flex items-center justify-between mb-4 pt-4 border-t border-zinc-200">
                        <span class="text-lg font-semibold">Subtotal</span>
                        <span class="text-2xl font-bold">${{ number_format($this->subtotal, 0) }}</span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-2">
                        <a href="#contact" wire:click="toggle"
                            class="w-full bg-zinc-900 text-white py-4 rounded-xl font-medium hover:bg-zinc-800 transition-colors block text-center">
                            Contact Dealer
                        </a>
                        <button wire:click="toggle"
                            class="w-full bg-white text-zinc-900 py-3 rounded-xl font-medium border border-zinc-300 hover:bg-zinc-50 transition-colors">
                            Continue Shopping
                        </button>
                    </div>

                    <!-- Info Text -->
                    <p class="text-xs text-zinc-500 text-center mt-4">
                        Tax and shipping calculated at checkout
                    </p>
                </div>
            @endif
        </div>
    </div>

    <!-- Overlay -->
    @if($showCart)
        <div class="fixed inset-0 bg-black/50 z-40 transition-opacity" wire:click="toggle"></div>
    @endif
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

    // Listen for toggle cart
    Livewire.on('toggleCart', () => {
        $wire.toggle();
    });

    // Prevent body scroll when cart is open
    $wire.on('cart-updated', () => {
        if ($wire.showCart) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    });
</script>
@endscript