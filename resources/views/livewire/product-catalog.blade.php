<div>
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h2 class="text-3xl font-bold mb-2">Our Collection</h2>
                <p class="text-zinc-600">{{ $products->count() }} vehicles available</p>
            </div>
            <button wire:click="resetFilters" class="mt-4 md:mt-0 text-sm text-zinc-600 hover:text-zinc-900 underline">
                Reset All Filters
            </button>
        </div>

        <!-- Search Bar -->
        <div class="mb-4">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-zinc-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" wire:model.live.debounce.300ms="searchQuery"
                    placeholder="Search by name, category, or badge..."
                    class="w-full pl-12 pr-4 py-3 border border-zinc-200 rounded-xl focus:outline-none focus:border-zinc-900 transition-colors">
                @if($searchQuery)
                    <button wire:click="$set('searchQuery', '')"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>

        <!-- Filters & Sorting -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Category Filter -->
            <select wire:model.live="categoryFilter" class="filter-select">
                <option value="all">All Categories</option>
                <option value="supercar">Supercar</option>
                <option value="hypercar">Hypercar</option>
                <option value="gt">Grand Tourer</option>
                <option value="classic">Classic</option>
            </select>

            <!-- Price Range Filter -->
            <select wire:model.live="priceFilter" class="filter-select">
                <option value="all">All Prices</option>
                <option value="0-200">Under $200k</option>
                <option value="200-500">$200k - $500k</option>
                <option value="500+">$500k+</option>
            </select>

            <!-- Sort By -->
            <select wire:model.live="sortBy" class="filter-select md:col-span-2">
                <option value="newest">Newest First</option>
                <option value="price_low">Price: Low to High</option>
                <option value="price_high">Price: High to Low</option>
                <option value="name_asc">Name: A to Z</option>
                <option value="name_desc">Name: Z to A</option>
            </select>
        </div>

        <!-- Active Filters Display -->
        @if($searchQuery || $categoryFilter !== 'all' || $priceFilter !== 'all' || $sortBy !== 'newest')
            <div class="mt-4 flex flex-wrap gap-2">
                <span class="text-sm text-zinc-600">Active filters:</span>

                @if($searchQuery)
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-zinc-100 rounded-full text-sm">
                        Search: "{{ $searchQuery }}"
                        <button wire:click="$set('searchQuery', '')" class="ml-1 text-zinc-600 hover:text-zinc-900">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                @endif

                @if($categoryFilter !== 'all')
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-zinc-100 rounded-full text-sm">
                        Category: {{ ucfirst($categoryFilter) }}
                        <button wire:click="$set('categoryFilter', 'all')" class="ml-1 text-zinc-600 hover:text-zinc-900">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                @endif

                @if($priceFilter !== 'all')
                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-zinc-100 rounded-full text-sm">
                        Price:
                        @if($priceFilter === '0-200') Under $200k
                        @elseif($priceFilter === '200-500') $200k - $500k
                        @else $500k+
                        @endif
                        <button wire:click="$set('priceFilter', 'all')" class="ml-1 text-zinc-600 hover:text-zinc-900">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </span>
                @endif
            </div>
        @endif
    </div>

    <!-- Products Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="product-card" wire:key="product-{{ $product->id }}">
                <!-- Product Image -->
                <div class="product-image" wire:click="$dispatch('openProductModal', { productId: {{ $product->id }} })">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover"
                        loading="lazy">
                    <div class="product-badge">{{ $product->badge }}</div>
                </div>

                <!-- Product Info -->
                <div class="product-info">
                    <div class="product-category">{{ ucfirst($product->category) }}</div>
                    <h3 class="product-name cursor-pointer"
                        wire:click="$dispatch('openProductModal', { productId: {{ $product->id }} })">
                        {{ $product->name }}
                    </h3>

                    <!-- Specs -->
                    <div class="product-specs">
                        <div class="spec-item" title="Horsepower">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            <span>{{ $product->horsepower }} hp</span>
                        </div>
                        <div class="spec-item" title="0-60 mph">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $product->acceleration }}</span>
                        </div>
                        <div class="spec-item" title="Top Speed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span>{{ $product->top_speed }}</span>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="product-footer">
                        <div class="flex flex-col">
                            <span class="text-xs text-zinc-500 mb-1">Starting from</span>
                            <div class="product-price">${{ number_format($product->price, 0) }}</div>
                        </div>
                        <button wire:click.stop="addToCart({{ $product->id }})" class="add-to-cart"
                            wire:loading.attr="disabled" wire:target="addToCart({{ $product->id }})">
                            <span wire:loading.remove wire:target="addToCart({{ $product->id }})">
                                Add to Cart
                            </span>
                            <span wire:loading wire:target="addToCart({{ $product->id }})" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Adding...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16">
                <svg class="w-16 h-16 mx-auto text-zinc-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-zinc-400 text-lg mb-2">No vehicles found</p>
                <p class="text-zinc-500 text-sm">Try adjusting your search or filter criteria</p>
                <button wire:click="resetFilters" class="mt-4 text-sm text-zinc-900 hover:underline">
                    Reset Filters
                </button>
            </div>
        @endforelse
    </div>
</div>

@script
<script>
    // Listen for add to cart events
    Livewire.on('cart-updated', () => {
        console.log('Cart updated');
    });

    // Listen for notifications
    Livewire.on('notify', (event) => {
        // You can integrate a toast notification library here
        console.log(event.message);
    });
</script>
@endscript