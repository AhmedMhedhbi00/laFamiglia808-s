<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'service_id',
        'date', 'time', 'duration', 'notes', 'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'confirmed' => 'Confermata',
            'cancelled' => 'Annullata',
            default     => 'In attesa',
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'confirmed' => 'badge-green',
            'cancelled' => 'badge-red',
            default     => 'badge-yellow',
        };
    }
}
