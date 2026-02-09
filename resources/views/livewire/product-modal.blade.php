<!-- Product Detail Modal -->
<div class="product-modal {{ $showModal ? 'active' : '' }}" wire:ignore.self>
    <div class="product-modal-content">
        <button wire:click="closeModal" class="modal-close" aria-label="Close modal">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        @if($product)
            <div class="modal-image">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
            <div class="modal-body">
                <div class="modal-header">
                    <div class="modal-category">{{ $product->category }}</div>
                    <h2 class="modal-title">{{ $product->name }}</h2>
                    <div class="modal-price">${{ number_format($product->price, 0) }}</div>
                </div>

                <p class="modal-description">{{ $product->description }}</p>

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
                        <div class="spec-label">Status</div>
                        <div class="spec-value">{{ $product->badge }}</div>
                    </div>
                </div>

                <button wire:click="addToCartAndClose" class="btn-primary w-full">
                    Add to Cart - ${{ number_format($product->price, 0) }}
                </button>
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
</script>
@endscript