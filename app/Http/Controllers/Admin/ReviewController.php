<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('order')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviews.form', ['review' => new Review()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'role'   => 'nullable|string|max:80',
            'body'   => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'active' => 'boolean',
            'order'  => 'integer|min:0',
        ]);
        $data['active'] = $request->boolean('active');
        Review::create($data);
        return redirect()->route('admin.reviews.index')->with('success', 'Recensione aggiunta!');
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.form', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100',
            'role'   => 'nullable|string|max:80',
            'body'   => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'active' => 'boolean',
            'order'  => 'integer|min:0',
        ]);
        $data['active'] = $request->boolean('active');
        $review->update($data);
        return redirect()->route('admin.reviews.index')->with('success', 'Recensione aggiornata!');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Recensione eliminata.');
    }
}
