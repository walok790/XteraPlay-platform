<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'description', 'discount_type', 'discount_value',
        'usage_limit', 'times_used', 'starts_at', 'expires_at', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'discount_value' => 'decimal:2',
    ];

    public function isValid(): bool
    {
        if (! $this->is_active) return false;
        if ($this->starts_at && $this->starts_at->isFuture()) return false;
        if ($this->expires_at && $this->expires_at->isPast()) return false;
        if ($this->usage_limit && $this->times_used >= $this->usage_limit) return false;
        return true;
    }

    public function getStatusAttribute(): string
    {
        if (! $this->is_active) return 'Inactive';
        if ($this->expires_at && $this->expires_at->isPast()) return 'Expired';
        if ($this->starts_at && $this->starts_at->isFuture()) return 'Scheduled';
        if ($this->usage_limit && $this->times_used >= $this->usage_limit) return 'Depleted';
        return 'Active';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
