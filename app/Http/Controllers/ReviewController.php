<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:100',
            'customer_city' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:5|max:1000',
        ]);

        $user = Auth::user();
        $avatar = $user?->avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80';

        $review = Review::create([
            'product_id' => $validated['product_id'],
            'user_id' => Auth::id(),
            'customer_name' => $user ? $user->name : $validated['customer_name'],
            'customer_city' => $validated['customer_city'] ?: 'Indonesia',
            'customer_avatar' => $avatar,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Terima kasih! Ulasan & rating bintang Anda telah dipublikasikan 💕',
                'review' => $review,
            ]);
        }

        return back()->with('success', 'Terima kasih atas ulasan manis dan bintangnya! 💕✨');
    }
}
