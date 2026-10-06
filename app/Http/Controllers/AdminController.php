<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        // Authorization is handled by 'admin' middleware
    }

    public function dashboard()
    {
        $this->checkAdmin();

        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalReviews = Review::count();
        $avgRating = round(Review::avg('rating') ?? 5.0, 1);

        $recentOrders = Order::latest()->take(6)->get();
        $recentReviews = Review::with('product')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'totalReviews',
            'avgRating',
            'recentOrders',
            'recentReviews'
        ));
    }

    // ================= PRODUCT MANAGEMENT =================
    public function products()
    {
        $this->checkAdmin();
        $products = Product::with('category')->withCount('reviews')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function createProduct()
    {
        $this->checkAdmin();
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url',
            'badge' => 'nullable|string|max:50',
            'badge_color' => 'nullable|string|max:50',
            'material' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'colors' => 'nullable|string', // comma separated "Pink, Cream, Lilac"
            'sizes' => 'nullable|string',  // comma separated "S, M, L, XL"
        ]);

        $slug = Str::slug($validated['name']) . '-' . rand(100, 999);

        // Calculate discount %
        $discount = 0;
        if (!empty($validated['original_price']) && $validated['original_price'] > $validated['price']) {
            $discount = round((($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100);
        }

        // Format colors
        $colorsArray = [];
        if (!empty($validated['colors'])) {
            $rawColors = explode(',', $validated['colors']);
            $presetHex = ['#FCE7F3', '#DCFCE7', '#E0E7FF', '#FEF3C7', '#F1F5F9', '#DDD6FE'];
            foreach ($rawColors as $index => $c) {
                $trimmed = trim($c);
                if ($trimmed) {
                    $colorsArray[] = [
                        'name' => $trimmed,
                        'hex' => $presetHex[$index % count($presetHex)],
                    ];
                }
            }
        }

        // Format sizes
        $sizesArray = [];
        if (!empty($validated['sizes'])) {
            $rawSizes = explode(',', $validated['sizes']);
            foreach ($rawSizes as $s) {
                $trimmed = trim($s);
                if ($trimmed) $sizesArray[] = $trimmed;
            }
        }

        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?: $validated['price'],
            'discount' => $discount,
            'stock' => $validated['stock'],
            'image' => $validated['image'] ?: 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?auto=format&fit=crop&w=800&q=80',
            'badge' => $validated['badge'] ?: 'NEW DROP',
            'badge_color' => $validated['badge_color'] ?: 'bg-rose-500',
            'colors' => $colorsArray,
            'sizes' => $sizesArray,
            'material' => $validated['material'] ?: 'Katun Premium Adem & Lembut',
            'description' => $validated['description'],
            'is_featured' => true,
        ]);

        return redirect()->route('admin.products')->with('success', '✨ Produk baju baru berhasil ditambahkan ke toko!');
    }

    public function editProduct(Product $product)
    {
        $this->checkAdmin();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|url',
            'badge' => 'nullable|string|max:50',
            'material' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $discount = 0;
        if (!empty($validated['original_price']) && $validated['original_price'] > $validated['price']) {
            $discount = round((($validated['original_price'] - $validated['price']) / $validated['original_price']) * 100);
        }

        $product->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?: $validated['price'],
            'discount' => $discount,
            'stock' => $validated['stock'],
            'image' => $validated['image'] ?: $product->image,
            'badge' => $validated['badge'],
            'material' => $validated['material'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.products')->with('success', 'Produk baju berhasil diperbarui!');
    }

    public function deleteProduct(Product $product)
    {
        $this->checkAdmin();
        $name = $product->name;
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produk "' . $name . '" telah dihapus.');
    }

    // ================= ORDER MANAGEMENT =================
    public function orders()
    {
        $this->checkAdmin();
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'order_status' => 'required|in:diproses,dikirim,selesai,dibatalkan',
            'payment_status' => 'required|in:pending,paid',
        ]);

        $order->update($validated);

        return back()->with('success', 'Status pesanan #' . $order->order_number . ' berhasil diubah!');
    }

    // ================= REVIEW MANAGEMENT =================
    public function reviews()
    {
        $this->checkAdmin();
        $reviews = Review::with('product')->latest()->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function deleteReview(Review $review)
    {
        $this->checkAdmin();
        $review->delete();
        return back()->with('success', 'Ulasan pembeli berhasil dihapus.');
    }
}
