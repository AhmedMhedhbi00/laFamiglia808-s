<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name', 'role', 'body', 'rating', 'avatar', 'active', 'order',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
