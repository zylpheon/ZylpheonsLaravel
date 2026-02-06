@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center pt-20 px-6 lg:px-8 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-20 right-10 w-72 h-72 bg-zinc-100 rounded-full blur-3xl opacity-30 animate-float"></div>
    <div class="absolute bottom-20 left-10 w-96 h-96 bg-zinc-50 rounded-full blur-3xl opacity-40 animate-float-delayed"></div>
    
    <div class="max-w-7xl mx-auto w-full relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="hero-content">
                <div class="inline-block px-4 py-2 bg-zinc-100 rounded-full text-sm font-medium mb-6">
                    Premium Collection 2026
                </div>
                <h1 class="hero-title mb-6">
                    Experience the<br>
                    <span class="italic font-light">Art of Speed</span>
                </h1>
                <p class="text-xl text-zinc-600 mb-8 max-w-lg leading-relaxed">
                    Curated selection of the world's most exceptional sports cars. Where engineering meets passion.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#catalog" class="btn-primary">
                        Explore Collection
                    </a>
                    <a href="#contact" class="btn-secondary">
                        Schedule Visit
                    </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="aspect-video bg-zinc-100 rounded-3xl overflow-hidden relative group">
                    <img src="{{ asset('images/image1.jpeg') }}" alt="Luxury ZYLPH Showroom Interior"
                        class="w-full h-full object-cover" loading="eager">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 px-6 lg:px-8 border-t border-zinc-100">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="stat-item">
                <div class="stat-number">250+</div>
                <div class="stat-label">Premium Vehicles</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">15+</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Concierge Service</div>
            </div>
        </div>
    </div>
</section>

<!-- Parallax Divider Section -->
<section class="relative h-96 overflow-hidden">
    <div class="parallax-bg absolute inset-0 bg-cover bg-center bg-fixed" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/image14.jpeg') }}');">
    </div>
    <div class="relative z-10 h-full flex items-center justify-center text-center px-6">
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Crafted for Excellence</h2>
            <p class="text-xl text-white/90 max-w-2xl mx-auto">Every detail engineered to perfection, every journey designed to inspire</p>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section id="catalog" class="py-24 px-6 lg:px-8 bg-zinc-50">
    <div class="max-w-7xl mx-auto">
        @livewire('product-catalog')
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-24 px-6 lg:px-8 bg-white relative overflow-hidden">
    <!-- Decorative Grid Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <h2 class="section-title mb-4">The ZYLPH Experience</h2>
            <p class="text-xl text-zinc-600 max-w-2xl mx-auto">
                Beyond cars, we offer a lifestyle of unparalleled luxury and excitement
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Experience Card 1 -->
            <div class="experience-card group">
                <div class="experience-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Exclusive Test Drives</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Experience the thrill on our private track with professional instructors guiding your journey
                </p>
            </div>

            <!-- Experience Card 2 -->
            <div class="experience-card group">
                <div class="experience-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Concierge Delivery</h3>
                <p class="text-zinc-600 leading-relaxed">
                    White-glove delivery service to your doorstep, anywhere in the world
                </p>
            </div>

            <!-- Experience Card 3 -->
            <div class="experience-card group">
                <div class="experience-icon">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">VIP Events Access</h3>
                <p class="text-zinc-600 leading-relaxed">
                    Exclusive invitations to automotive shows, racing events, and private gatherings
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 px-6 lg:px-8 bg-zinc-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="section-title mb-4">What Our Clients Say</h2>
            <p class="text-xl text-zinc-600">Trusted by automotive enthusiasts worldwide</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="flex mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-zinc-600 mb-6 leading-relaxed">
                    "Absolutely phenomenal experience from start to finish. The team at ZYLPH made buying my dream car effortless and enjoyable."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-zinc-200 rounded-full mr-4"></div>
                    <div>
                        <div class="font-semibold">Michael Chen</div>
                        <div class="text-sm text-zinc-500">Hypercar Collector</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="flex mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-zinc-600 mb-6 leading-relaxed">
                    "The level of service and attention to detail is unmatched. ZYLPH truly understands what luxury car buyers want."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-zinc-200 rounded-full mr-4"></div>
                    <div>
                        <div class="font-semibold">Sarah Williams</div>
                        <div class="text-sm text-zinc-500">Entrepreneur</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="flex mb-4">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-zinc-600 mb-6 leading-relaxed">
                    "I've purchased three cars through ZYLPH. Their expertise and professionalism keep me coming back."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-zinc-200 rounded-full mr-4"></div>
                    <div>
                        <div class="font-semibold">David Rodriguez</div>
                        <div class="text-sm text-zinc-500">Classic Car Enthusiast</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-24 px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="aspect-video bg-zinc-100 rounded-3xl mb-8 overflow-hidden">
                    <img src="{{ asset('images/image11.jpeg') }}" alt="ZYLPH Test Drive Experience Facility"
                        class="w-full h-full object-cover" loading="lazy">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-video bg-zinc-100 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/image12.jpeg') }}" alt="ZYLPH State-of-the-Art Service Workshop"
                            class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="aspect-video bg-zinc-100 rounded-2xl overflow-hidden">
                        <img src="{{ asset('images/image13.jpeg') }}" alt="ZYLPH Manufacturing and Detailing Facility"
                            class="w-full h-full object-cover" loading="lazy">
                    </div>
                </div>
            </div>

            <div>
                <h2 class="section-title mb-6">Redefining Luxury Automotive Experience</h2>
                <p class="text-lg text-zinc-600 mb-6 leading-relaxed">
                    For over a decade, ZYLPH has been the premier destination for automotive enthusiasts
                    seeking the extraordinary. We don't just sell cars; we curate dreams.
                </p>
                <p class="text-lg text-zinc-600 mb-8 leading-relaxed">
                    Every vehicle in our collection undergoes rigorous inspection and comes with our comprehensive
                    warranty. Our team of specialists ensures that your ownership experience is nothing short of
                    exceptional.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Certified Authenticity</h3>
                            <p class="text-zinc-600">Every vehicle verified and documented</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">Secure Transactions</h3>
                            <p class="text-zinc-600">Protected and transparent process</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 bg-zinc-900 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold mb-1">White Glove Service</h3>
                            <p class="text-zinc-600">Personalized attention to every detail</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-24 px-6 lg:px-8 bg-zinc-50">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="section-title mb-4">Get in Touch</h2>
            <p class="text-xl text-zinc-600">
                Ready to start your journey? Our team is here to assist you.
            </p>
        </div>

        @if(session('success'))
            <div class="success-message mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-3xl p-8 lg:p-12 shadow-sm">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-input" required value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-input" required value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" required value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-6">
                <label for="interest" class="form-label">I'm interested in</label>
                <select id="interest" name="interest" class="form-input">
                    <option value="">Select an option</option>
                    <option value="buying" {{ old('interest') == 'buying' ? 'selected' : '' }}>Purchasing a Vehicle</option>
                    <option value="selling" {{ old('interest') == 'selling' ? 'selected' : '' }}>Selling My Vehicle</option>
                    <option value="trade" {{ old('interest') == 'trade' ? 'selected' : '' }}>Trade-In Options</option>
                    <option value="consultation" {{ old('interest') == 'consultation' ? 'selected' : '' }}>General Consultation</option>
                </select>
                @error('interest')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-8">
                <label for="message" class="form-label">Message</label>
                <textarea id="message" name="message" rows="5" class="form-input">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full btn-primary">
                Send Message
            </button>
        </form>
    </div>
</section>

@livewire('product-modal')

@endsection
