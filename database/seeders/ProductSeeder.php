<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Zylph GT-R Evolution',
                'category' => 'supercar',
                'price' => 189000,
                'year' => 2026,
                'horsepower' => 650,
                'torque' => '590 lb-ft',
                'acceleration' => '2.9s',
                'top_speed' => '205 mph',
                'description' => 'The ultimate expression of performance engineering. Hand-built twin-turbo V8 delivering uncompromising power with refined luxury.',
                'badge' => 'New Arrival',
                'image' => 'images/image2.jpeg'
            ],
            [
                'name' => 'Carbon Fiber RS',
                'category' => 'hypercar',
                'price' => 625000,
                'year' => 2026,
                'horsepower' => 890,
                'torque' => '664 lb-ft',
                'acceleration' => '2.3s',
                'top_speed' => '230 mph',
                'description' => 'Limited production masterpiece featuring aerospace-grade carbon fiber monocoque and hybrid powertrain technology.',
                'badge' => 'Limited',
                'image' => 'images/image3.jpeg'
            ],
            [
                'name' => 'Veloce Grand Tourer',
                'category' => 'gt',
                'price' => 245000,
                'year' => 2026,
                'horsepower' => 580,
                'torque' => '510 lb-ft',
                'acceleration' => '3.5s',
                'top_speed' => '198 mph',
                'description' => 'The perfect blend of high-performance capability and long-distance comfort. Naturally aspirated V12 symphony.',
                'badge' => 'Featured',
                'image' => 'images/image4.jpeg'
            ],
            [
                'name' => 'Heritage Classic \'67',
                'category' => 'classic',
                'price' => 385000,
                'year' => 1967,
                'horsepower' => 425,
                'torque' => '480 lb-ft',
                'acceleration' => '4.2s',
                'top_speed' => '175 mph',
                'description' => 'Fully restored icon from the golden era. Numbers-matching, documented provenance, concours condition.',
                'badge' => 'Collectible',
                'image' => 'images/image5.jpeg'
            ],
            [
                'name' => 'Titan Track Edition',
                'category' => 'supercar',
                'price' => 298000,
                'year' => 2026,
                'horsepower' => 720,
                'torque' => '620 lb-ft',
                'acceleration' => '2.7s',
                'top_speed' => '212 mph',
                'description' => 'Circuit-bred performance with street legality. Adjustable aerodynamics and track-focused suspension geometry.',
                'badge' => 'Performance',
                'image' => 'images/image6.jpeg'
            ],
            [
                'name' => 'Phantom Ultra Hyper',
                'category' => 'hypercar',
                'price' => 1200000,
                'year' => 2026,
                'horsepower' => 1500,
                'torque' => '1180 lb-ft',
                'acceleration' => '1.9s',
                'top_speed' => '261 mph',
                'description' => 'The pinnacle of automotive achievement. Quad-turbo W16 engine with active aerodynamics and all-wheel drive.',
                'badge' => 'Exclusive',
                'image' => 'images/image7.jpeg'
            ],
            [
                'name' => 'Continental GT Sport',
                'category' => 'gt',
                'price' => 175000,
                'year' => 2026,
                'horsepower' => 500,
                'torque' => '450 lb-ft',
                'acceleration' => '3.8s',
                'top_speed' => '190 mph',
                'description' => 'Refined grand touring with modern technology. Twin-turbo V8 matched with luxurious hand-crafted interior.',
                'badge' => 'Available',
                'image' => 'images/image8.jpeg'
            ],
            [
                'name' => 'Roadster Classic \'72',
                'category' => 'classic',
                'price' => 145000,
                'year' => 1972,
                'horsepower' => 350,
                'torque' => '380 lb-ft',
                'acceleration' => '5.5s',
                'top_speed' => '155 mph',
                'description' => 'Timeless convertible elegance. Professionally restored with period-correct details and modern reliability upgrades.',
                'badge' => 'Restored',
                'image' => 'images/image9.jpeg'
            ],
            [
                'name' => 'Zylph S Performance',
                'category' => 'supercar',
                'price' => 156000,
                'year' => 2026,
                'horsepower' => 580,
                'torque' => '540 lb-ft',
                'acceleration' => '3.2s',
                'top_speed' => '195 mph',
                'description' => 'Entry into the supercar realm without compromise. Turbo V6 with rear-wheel drive purity and perfect balance.',
                'badge' => 'Best Value',
                'image' => 'images/image10.jpeg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
