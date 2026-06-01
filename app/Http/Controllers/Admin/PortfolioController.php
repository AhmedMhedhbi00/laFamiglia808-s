<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = Portfolio::orderBy('created_at', 'desc')->get();
        return view('admin.portfolio.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio.form', ['item' => new Portfolio()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'artist'      => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'genre'       => 'nullable|string|max:60',
            'year'        => 'nullable|integer|min:2000|max:2099',
            'spotify_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'soundcloud_url' => 'nullable|url',
            'cover'       => 'nullable|image|max:2048',
            'featured'    => 'boolean',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('portfolio', 'public');
        }

        $data['featured'] = $request->boolean('featured');
        Portfolio::create($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Progetto aggiunto!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.form', ['item' => $portfolio]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:120',
            'artist'      => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'genre'       => 'nullable|string|max:60',
            'year'        => 'nullable|integer|min:2000|max:2099',
            'spotify_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'soundcloud_url' => 'nullable|url',
            'cover'       => 'nullable|image|max:2048',
            'featured'    => 'boolean',
        ]);

        if ($request->hasFile('cover')) {
            if ($portfolio->cover) Storage::disk('public')->delete($portfolio->cover);
            $data['cover'] = $request->file('cover')->store('portfolio', 'public');
        }

        $data['featured'] = $request->boolean('featured');
        $portfolio->update($data);

        return redirect()->route('admin.portfolio.index')->with('success', 'Progetto aggiornato!');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->cover) Storage::disk('public')->delete($portfolio->cover);
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Progetto eliminato.');
    }
}
