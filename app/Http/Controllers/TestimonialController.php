<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required'
        ]);

        Testimonial::create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'ulasan' => $request->ulasan
        ]);

        return back()->with(
            'success',
            'Terima kasih atas ulasan Anda!'
        );
    }
}