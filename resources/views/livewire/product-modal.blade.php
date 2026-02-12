<!-- Product Detail Modal -->
<div class="product-modal {{ $showModal ? 'active' : '' }}" wire:ignore.self>
    <div class="product-modal-content">
        <button wire:click="closeModal" class="modal-close" aria-label="Close modal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        @if($product)
            <!-- Modal Image -->
            <div class="modal-image relative">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4 bg-white px-4 py-2 rounded-full shadow-lg">
                    <span class="text-sm font-semibold">{{ $product->badge }}</span>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Header -->
                <div class="modal-header">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="modal-category">{{ ucfirst($product->category) }}</div>
                            <h2 class="modal-title">{{ $product->name }}</h2>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-sm text-zinc-500">Year:</span>
                                <span class="text-sm font-semibold">{{ $product->year }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-zinc-500 mb-1">Starting from</div>
                            <div class="modal-price">${{ number_format($product->price, 0) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Description</h3>
                    <p class="modal-description">{{ $product->description }}</p>
                </div>

                <!-- Specifications -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-4">Specifications</h3>
                    <div class="specs-grid">
                        <div class="spec-detail">
                            <div class="spec-label">Year</div>
                            <div class="spec-value">{{ $product->year }}</div>
                        </div>
                        <div class="spec-detail">
                            <div class="spec-label">Horsepower</div>
                            <div class="spec-value">{{ $product->horsepower }} hp</div>
                        </div>
                        <div class="spec-detail">
                            <div class="spec-label">Torque</div>
                            <div class="spec-value">{{ $product->torque }}</div>
                        </div>
                        <div class="spec-detail">
                            <div class="spec-label">0-60 mph</div>
                            <div class="spec-value">{{ $product->acceleration }}</div>
                        </div>
                        <div class="spec-detail">
                            <div class="spec-label">Top Speed</div>
                            <div class="spec-value">{{ $product->top_speed }}</div>
                        </div>
                        <div class="spec-detail">
                            <div class="spec-label">Category</div>
                            <div class="spec-value">{{ ucfirst($product->category) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Quantity Selector & Add to Cart -->
                <div class="border-t border-zinc-200 pt-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex-1">
                            <label class="block text-sm font-semibold mb-2">Quantity</label>
                            <div class="flex items-center gap-3">
                                <button wire:click="decrementQuantity"
                                    class="w-10 h-10 flex items-center justify-center border border-zinc-300 rounded-lg hover:bg-zinc-100 transition-colors"
                                    wire:loading.attr="disabled">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4" />
                                    </svg>
                                </button>

                                <input type="number" wire:model.live="quantity" min="1"
                                    class="w-20 h-10 text-center border border-zinc-300 rounded-lg font-semibold focus:outline-none focus:border-zinc-900">

                                <button wire:click="incrementQuantity"
                                    class="w-10 h-10 flex items-center justify-center border border-zinc-300 rounded-lg hover:bg-zinc-100 transition-colors"
                                    wire:loading.attr="disabled">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex-1">
                            <label class="block text-sm font-semibold mb-2">Subtotal</label>
                            <div class="text-2xl font-bold">
                                ${{ number_format($product->price * $quantity, 0) }}
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-2 gap-4">
                        <button wire:click="addToCartAndClose" class="btn-primary w-full" wire:loading.attr="disabled"
                            wire:target="addToCartAndClose">
                            <span wire:loading.remove wire:target="addToCartAndClose">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </span>
                            <span wire:loading wire:target="addToCartAndClose"
                                class="flex items-center justify-center gap-2">
                                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Adding...
                            </span>
                        </button>

                        <a href="#contact" wire:click="closeModal"
                            class="btn-secondary w-full flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Dealer
                        </a>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 p-4 bg-zinc-50 rounded-lg">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-zinc-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="flex-1 text-sm text-zinc-600">
                            <p class="font-semibold mb-1">Need more information?</p>
                            <p>Contact our sales team for detailed specifications, financing options, and to schedule a test
                                drive.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@script
<script>
    // Listen for openProductModal event
    Livewire.on('openProductModal', (event) => {
        $wire.openProductModal(event.productId);
    });

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && $wire.showModal) {
            $wire.closeModal();
        }
    });

    // Close modal on backdrop click
    const modalElement = document.querySelector('.product-modal');
    if (modalElement) {
        modalElement.addEventListener('click', function (e) {
            if (e.target === this) {
                $wire.closeModal();
            }
        });
    }

    // Prevent body scroll when modal is open
    $wire.on('product-modal-opened', () => {
        document.body.style.overflow = 'hidden';
    });

    $wire.on('product-modal-closed', () => {
        document.body.style.overflow = '';
    });
</script>
@endscript