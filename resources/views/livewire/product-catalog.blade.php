<div>
    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-12">
        <div>
            <h2 class="section-title mb-4">Our Collection</h2>
            <p class="text-xl text-zinc-600 max-w-2xl">
                Each vehicle in our collection represents the pinnacle of automotive excellence
            </p>
        </div>

        <div class="mt-8 lg:mt-0 flex items-center gap-4">
            <select wire:model.live="categoryFilter" class="filter-select">
                <option value="all">All Categories</option>
                <option value="supercar">Supercar</option>
                <option value="hypercar">Hypercar</option>
                <option value="gt">Grand Tourer</option>
                <option value="classic">Classic</option>
            </select>

            <select wire:model.live="priceFilter" class="filter-select">
                <option value="all">All Prices</option>
                <option value="0-200">Under $200K</option>
                <option value="200-500">$200K - $500K</option>
                <option value="500+">$500K+</option>
            </select>
        </div>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="product-card" wire:click="$dispatch('openProductModal', { productId: {{ $product->id }} })">
                <div class="product-image">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    <span class="product-badge">{{ $product->badge }}</span>
                </div>
                <div class="product-info">
                    <div class="product-category">{{ $product->category }}</div>
                    <h3 class="product-name">{{ $product->name }}</h3>
                    
                    <div class="product-specs">
                        <div class="spec-item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            {{ $product->horsepower }}hp
                        </div>
                        <div class="spec-item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $product->acceleration }}
                        </div>
                    </div>
                    
                    <div class="product-footer">
                        <div class="product-price">${{ number_format($product->price, 0) }}</div>
                        <button wire:click.stop="$dispatch('addToCart', { productId: {{ $product->id }} })" class="add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-zinc-400 text-lg">No products found matching your criteria.</p>
            </div>
        @endforelse
    </div>
</div>

@script
<script>
    // Animation observer for product cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all product cards
    $wire.on('products-updated', () => {
        setTimeout(() => {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        }, 50);
    });

    // Initial observation
    setTimeout(() => {
        document.querySelectorAll('.product-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(card);
        });
    }, 100);
</script>
@endscript
