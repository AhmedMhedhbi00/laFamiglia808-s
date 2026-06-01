<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'artist', 'description', 'genre', 'year',
        'spotify_url', 'youtube_url', 'soundcloud_url', 'cover', 'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function getCoverUrlAttribute(): string
    {
        return $this->cover
            ? asset('storage/' . $this->cover)
            : asset('images/default-cover.jpg');
    }
}
