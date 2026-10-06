<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class ProductController extends Controller
{
    public function index()
    {
        // 1. Get Categories from Database
        $categoriesDb = Category::all();
        $categories = [
            ['id' => 'all', 'name' => 'Semua Koleksi', 'icon' => '✨']
        ];
        foreach ($categoriesDb as $cat) {
            $categories[] = [
                'id' => $cat->slug,
                'name' => $cat->name,
                'icon' => $cat->icon,
            ];
        }

        // 2. Get Products from Database
        $productsDb = Product::with(['category', 'reviews'])->where('is_featured', true)->latest()->get();
        
        $products = [];
        foreach ($productsDb as $p) {
            $products[] = [
                'id' => $p->id,
                'name' => $p->name,
                'category' => $p->category ? $p->category->slug : 'all',
                'category_name' => $p->category ? $p->category->name : 'Pakaian',
                'price' => (int) $p->price,
                'original_price' => (int) ($p->original_price ?: $p->price),
                'discount' => (int) $p->discount,
                'rating' => $p->rating,
                'reviews_count' => $p->reviews_count,
                'sold_count' => $p->sold_count ?: '50+',
                'stock' => $p->stock,
                'image' => $p->image,
                'badge' => $p->badge,
                'badge_color' => $p->badge_color,
                'colors' => $p->colors ?: [
                    ['name' => 'Soft Cream', 'hex' => '#FBF3D5'],
                    ['name' => 'Dusty Rose', 'hex' => '#FECDD3'],
                ],
                'sizes' => $p->sizes ?: ['S-M', 'L-XL'],
                'material' => $p->material,
                'description' => $p->description,
                'reviews' => $p->reviews->map(function($r) {
                    return [
                        'id' => $r->id,
                        'customer_name' => $r->customer_name,
                        'customer_city' => $r->customer_city,
                        'customer_avatar' => $r->customer_avatar,
                        'rating' => $r->rating,
                        'comment' => $r->comment,
                        'date' => $r->created_at->diffForHumans(),
                    ];
                }),
            ];
        }

        // 3. Get Real Reviews from Database for the testimonial section
        $testimonials = Review::with('product')
            ->where('is_approved', true)
            ->latest()
            ->take(6)
            ->get()
            ->map(function ($rev) {
                return [
                    'name' => $rev->customer_name,
                    'city' => $rev->customer_city,
                    'avatar' => $rev->customer_avatar ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80',
                    'rating' => $rev->rating,
                    'comment' => $rev->comment,
                    'product' => $rev->product ? $rev->product->name : 'Koleksi Khiells',
                    'date' => $rev->created_at->diffForHumans(),
                ];
            });

        // 4. Lookbook inspirations
        $lookbooks = [
            [
                'title' => 'Sunday Coffee Run ☕',
                'style' => 'Comfy Minimalist',
                'image' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80',
                'items' => 'Marshmallow Hoodie + Buttercup Skirt',
            ],
            [
                'title' => 'Korean Campus Vibe 📚',
                'style' => 'Preppy Aesthetic',
                'image' => 'https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=800&q=80',
                'items' => 'Chunky Knit Vest + Basic White Tee',
            ],
            [
                'title' => 'Golden Hour Picnic 🍓',
                'style' => 'Coquette & Dreamy',
                'image' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=800&q=80',
                'items' => 'Fairy Cottage Midi Dress',
            ],
            [
                'title' => 'City Walk Casual ✨',
                'style' => 'Clean Aesthetic',
                'image' => 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=800&q=80',
                'items' => 'Kyoto Ribbed Top + Quilted Bag',
            ],
        ];

        return view('home', compact('categories', 'products', 'lookbooks', 'testimonials'));
    }
}
