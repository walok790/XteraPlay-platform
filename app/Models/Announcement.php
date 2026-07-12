<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'message', 'type', 'is_active', 'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function getTypeColorAttribute(): string
    {
        return match ($this->type) {
            'success' => 'bg-emerald-50 text-emerald-700',
            'warning' => 'bg-amber-50 text-amber-700',
            'notice' => 'bg-slate-100 text-slate-700',
            default => 'bg-blue-50 text-blue-700',
        };
    }
}
