<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingNav extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'url', 'sort_order', 'is_visible', 'open_new_tab'];

    protected $casts = [
        'is_visible' => 'boolean',
        'open_new_tab' => 'boolean',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
