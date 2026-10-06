<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin Account
        $admin = User::firstOrCreate(
            ['email' => 'admin@khiells.com'],
            [
                'name' => 'Owner Khiells ✨',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '081234567890',
            ]
        );

        // 2. Create Sample Customer Account
        $customer = User::firstOrCreate(
            ['email' => 'customer@gmail.com'],
            [
                'name' => 'Nabila Putri (@nabilaptr)',
                'password' => Hash::make('password123'),
                'role' => 'customer',
                'phone' => '089876543210',
                'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
            ]
        );

        // 3. Create Categories
        $categoriesData = [
            ['name' => 'Cardigan & Knitwear', 'slug' => 'knitwear', 'icon' => '🧶'],
            ['name' => 'Korean Tops & Blouse', 'slug' => 'korean-tops', 'icon' => '🌸'],
            ['name' => 'Dress & Skirts', 'slug' => 'dresses', 'icon' => '👗'],
            ['name' => 'Oversized Hoodies', 'slug' => 'hoodies', 'icon' => '🧸'],
            ['name' => 'Cute Bags & Accs', 'slug' => 'accessories', 'icon' => '🎀'],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['slug']] = Category::firstOrCreate(['slug' => $c['slug']], $c);
        }

        // 4. Create Products
        $productsData = [
            [
                'category_id' => $categories['knitwear']->id,
                'name' => 'Cloud Fluffy Knit Cardigan',
                'slug' => 'cloud-fluffy-knit-cardigan',
                'price' => 165000,
                'original_price' => 220000,
                'discount' => 25,
                'stock' => 45,
                'sold_count' => '1.4k',
                'image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?auto=format&fit=crop&w=800&q=80',
                'badge' => 'BEST SELLER',
                'badge_color' => 'bg-rose-500',
                'colors' => [
                    ['name' => 'Lilac Dream', 'hex' => '#D8B4E2'],
                    ['name' => 'Soft Cream', 'hex' => '#FBF3D5'],
                    ['name' => 'Baby Blue', 'hex' => '#BFDBFE'],
                ],
                'sizes' => ['S-M (Oversize)', 'L-XL (Extra Oversize)'],
                'material' => 'Premium Soft Chenille Knit (Sangat lembut & tidak gatal)',
                'description' => 'Cardigan rajut ala Korea dengan tekstur berbulu lembut seperti awan. Cutting-an oversized yang super aesthetic dan nyaman dipakai untuk kuliah, hangout, atau ngopi santai di cafe favoritmu.',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['korean-tops']->id,
                'name' => 'Daisy Floral Puff Sleeve Blouse',
                'slug' => 'daisy-floral-puff-sleeve-blouse',
                'price' => 135000,
                'original_price' => 175000,
                'discount' => 22,
                'stock' => 30,
                'sold_count' => '890',
                'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&w=800&q=80',
                'badge' => 'TRENDING',
                'badge_color' => 'bg-amber-500',
                'colors' => [
                    ['name' => 'Vanilla Milk', 'hex' => '#FFFBEB'],
                    ['name' => 'Pastel Mint', 'hex' => '#D1FAE5'],
                    ['name' => 'Peach Sorbet', 'hex' => '#FFE4E6'],
                ],
                'sizes' => ['All Size Fit to L (LD 102cm)'],
                'material' => 'Cotton Crinkle Import (Ringan, jatuh & adem seharian)',
                'description' => 'Blouse motif bunga mini vintage dengan detail kerah manis dan lengan puff yang bikin ilusi lengan terlihat jenjang dan imut. Wajib punya untuk gaya coquette & feminine look!',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['dresses']->id,
                'name' => 'Buttercup Pleated Tennis Skirt',
                'slug' => 'buttercup-pleated-tennis-skirt',
                'price' => 129000,
                'original_price' => 159000,
                'discount' => 18,
                'stock' => 60,
                'sold_count' => '2.1k',
                'image' => 'https://images.unsplash.com/photo-1583496661160-fb5886a0aaaa?auto=format&fit=crop&w=800&q=80',
                'badge' => 'FAVORITE',
                'badge_color' => 'bg-pink-500',
                'colors' => [
                    ['name' => 'Ivory White', 'hex' => '#F8FAFC'],
                    ['name' => 'Midnight Black', 'hex' => '#1E293B'],
                    ['name' => 'Khaki Beige', 'hex' => '#D6C0B3'],
                ],
                'sizes' => ['S', 'M', 'L', 'XL'],
                'material' => 'Drill Garment Premium + Dilengkapi celana furing aman di dalam',
                'description' => 'Rok plisket ala idol K-Pop dengan pinggang high-waist yang pas di badan. Sudah dilengkapi celana pendek pengaman (safety pants) di bagian dalam jadi bebas bergerak dengan percaya diri.',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['hoodies']->id,
                'name' => 'Marshmallow Oversized Pastel Hoodie',
                'slug' => 'marshmallow-oversized-pastel-hoodie',
                'price' => 189000,
                'original_price' => 250000,
                'discount' => 24,
                'stock' => 25,
                'sold_count' => '1.7k',
                'image' => 'https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=800&q=80',
                'badge' => 'HOT DROP',
                'badge_color' => 'bg-purple-500',
                'colors' => [
                    ['name' => 'Baby Pink', 'hex' => '#FCE7F3'],
                    ['name' => 'Matcha Latte', 'hex' => '#DCFCE7'],
                    ['name' => 'Oatmeal Heather', 'hex' => '#F1F5F9'],
                ],
                'sizes' => ['M (Loose)', 'L (Oversize)', 'XL (Super Baggy)'],
                'material' => 'Baby Terry Cotton Fleece 280gsm (Tebal, hangat tanpa gerah)',
                'description' => 'Hoodie oversized dengan kantong kangguru dan tali serut aesthetic. Desain bordir minimalis lucu di bagian dada. Sangat cocok dipakai bareng bike shorts atau celana kulot.',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['korean-tops']->id,
                'name' => 'Kyoto Vintage Ribbed Crop Top',
                'slug' => 'kyoto-vintage-ribbed-crop-top',
                'price' => 89000,
                'original_price' => 110000,
                'discount' => 19,
                'stock' => 80,
                'sold_count' => '3.5k',
                'image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=800&q=80',
                'badge' => 'TOP VALUE',
                'badge_color' => 'bg-emerald-500',
                'colors' => [
                    ['name' => 'Sage Green', 'hex' => '#A7F3D0'],
                    ['name' => 'Dusty Rose', 'hex' => '#FECDD3'],
                    ['name' => 'Muted Charcoal', 'hex' => '#475569'],
                ],
                'sizes' => ['S', 'M', 'L'],
                'material' => 'Ribbed Knit Cotton Stretchable 4-ways',
                'description' => 'Crop top bergaris halus yang lentur dan mengikuti lekuk tubuh dengan pas. Simpel tapi langsung mengangkat style OOTD harian jadi super chic dan instagrammable.',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['dresses']->id,
                'name' => 'Fairy Cottage Midi Tiered Dress',
                'slug' => 'fairy-cottage-midi-tiered-dress',
                'price' => 210000,
                'original_price' => 279000,
                'discount' => 25,
                'stock' => 18,
                'sold_count' => '620',
                'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80',
                'badge' => 'LIMITED',
                'badge_color' => 'bg-fuchsia-500',
                'colors' => [
                    ['name' => 'Sunset Peach', 'hex' => '#FFEDD5'],
                    ['name' => 'Pure Coconut', 'hex' => '#FFFFFF'],
                    ['name' => 'Soft Lavender', 'hex' => '#E9D5FF'],
                ],
                'sizes' => ['S-M (LD 94cm)', 'L-XL (LD 104cm)'],
                'material' => 'Linen Silk Blend dengan furing katun lembut',
                'description' => 'Dress berjenjang anggun dengan ikatan pita di bagian punggung. Memancarkan aura feminin, manis, dan dreamy. Cocok untuk sesi foto outdoor, piknik taman, atau dinner date.',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['accessories']->id,
                'name' => 'Puffy Cloud Quilted Shoulder Bag',
                'slug' => 'puffy-cloud-quilted-shoulder-bag',
                'price' => 119000,
                'original_price' => 149000,
                'discount' => 20,
                'stock' => 50,
                'sold_count' => '4.2k',
                'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=800&q=80',
                'badge' => 'VIRAL TIKTOK',
                'badge_color' => 'bg-sky-500',
                'colors' => [
                    ['name' => 'Snow Puff', 'hex' => '#F8FAFC'],
                    ['name' => 'Cotton Candy', 'hex' => '#FBCFE8'],
                    ['name' => 'Blackberry', 'hex' => '#0F172A'],
                ],
                'sizes' => ['Dimensi: 30cm x 22cm x 10cm'],
                'material' => 'Nylon Quilted Premium + Padding busa empuk',
                'description' => 'Tas bahu empuk yang viral banget di media sosial! Muat iPad mini, dompet, pouch makeup, dan tumbler. Ringan, tahan cipratan air, dan estetik parah!',
                'is_featured' => true,
            ],
            [
                'category_id' => $categories['knitwear']->id,
                'name' => 'Chunky Knit Vest - Strawberry Edition',
                'slug' => 'chunky-knit-vest-strawberry-edition',
                'price' => 145000,
                'original_price' => 185000,
                'discount' => 21,
                'stock' => 35,
                'sold_count' => '940',
                'image' => 'https://images.unsplash.com/photo-1551803091-e20673f15770?auto=format&fit=crop&w=800&q=80',
                'badge' => 'CUTE PICK',
                'badge_color' => 'bg-rose-500',
                'colors' => [
                    ['name' => 'Berry Red & Cream', 'hex' => '#FDA4AF'],
                    ['name' => 'Avocado Green', 'hex' => '#BBF7D0'],
                    ['name' => 'Caramel Latte', 'hex' => '#E2E8F0'],
                ],
                'sizes' => ['All Size (Fit to XL)'],
                'material' => 'Thick Acrylic Wool Blend (Lembut & Hangat)',
                'description' => 'Vest rajut motif strawberry rajut timbul yang lucu menggemaskan. Padukan dengan kemeja putih oversized atau kaos polos untuk tampilan preppy Korean look seketika.',
                'is_featured' => true,
            ],
        ];

        foreach ($productsData as $p) {
            $createdProduct = Product::firstOrCreate(['slug' => $p['slug']], $p);

            // 5. Create Real Reviews in DB for each product
            Review::firstOrCreate(
                [
                    'product_id' => $createdProduct->id,
                    'customer_name' => 'Nabila Putri',
                ],
                [
                    'user_id' => $customer->id,
                    'customer_city' => 'Jakarta Selatan',
                    'customer_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                    'rating' => 5,
                    'comment' => 'Bahan ' . $createdProduct->name . ' ini super lembut banget! Nggak gatal sama sekali di kulit. Warnanya manis persis kayak di foto dan wangi waktu unboxing. Dapat free stiker gemes juga! Fix repeat order lagi 💕✨',
                    'is_approved' => true,
                ]
            );

            Review::firstOrCreate(
                [
                    'product_id' => $createdProduct->id,
                    'customer_name' => 'Shakira Alana',
                ],
                [
                    'user_id' => null,
                    'customer_city' => 'Bandung',
                    'customer_avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=200&q=80',
                    'rating' => 5,
                    'comment' => 'Kualitas jahitan rapi pol! Pengiriman kilat, kemarin order besok sorenya udah nyampe rumah. Packaging box pink estetik banget, serasa dapat kado ultah!',
                    'is_approved' => true,
                ]
            );
        }

        // 6. Create Initial Real Orders in DB so Admin Dashboard has real data
        Order::firstOrCreate(
            ['order_number' => 'KH-894120'],
            [
                'user_id' => $customer->id,
                'customer_name' => 'Nabila Putri',
                'customer_phone' => '089876543210',
                'shipping_address' => 'Jl. Kemang Raya No. 45, RT 02/05, Mampang Prapatan, Jakarta Selatan',
                'payment_method' => 'QRIS',
                'payment_status' => 'paid',
                'order_status' => 'diproses',
                'subtotal' => 300000,
                'discount_amount' => 30000,
                'shipping_fee' => 0,
                'total_amount' => 270000,
                'items_json' => [
                    [
                        'id' => 1,
                        'name' => 'Cloud Fluffy Knit Cardigan',
                        'price' => 165000,
                        'qty' => 1,
                        'selectedColor' => 'Lilac Dream',
                        'selectedSize' => 'S-M (Oversize)',
                        'image' => 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?auto=format&fit=crop&w=800&q=80',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Daisy Floral Puff Sleeve Blouse',
                        'price' => 135000,
                        'qty' => 1,
                        'selectedColor' => 'Vanilla Milk',
                        'selectedSize' => 'All Size Fit to L',
                        'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&w=800&q=80',
                    ]
                ],
                'notes' => 'Tolong bungkus rapi ya kak buat kado teman 💕',
            ]
        );

        Order::firstOrCreate(
            ['order_number' => 'KH-712395'],
            [
                'user_id' => null,
                'customer_name' => 'Aurelia Dian',
                'customer_phone' => '081299887766',
                'shipping_address' => 'Perum Dago Asri Blok C-12, Coblong, Kota Bandung',
                'payment_method' => 'BCA',
                'payment_status' => 'paid',
                'order_status' => 'dikirim',
                'subtotal' => 189000,
                'discount_amount' => 0,
                'shipping_fee' => 0,
                'total_amount' => 189000,
                'items_json' => [
                    [
                        'id' => 4,
                        'name' => 'Marshmallow Oversized Pastel Hoodie',
                        'price' => 189000,
                        'qty' => 1,
                        'selectedColor' => 'Baby Pink',
                        'selectedSize' => 'L (Oversize)',
                        'image' => 'https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=800&q=80',
                    ]
                ],
                'notes' => 'Resi kirim via WA ya kak',
            ]
        );
    }
}
