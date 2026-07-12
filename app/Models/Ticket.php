<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'subject', 'category', 'priority',
        'status', 'message', 'admin_reply', 'resolved_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status', ['open', 'pending']);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'open' => 'bg-blue-50 text-blue-700',
            'pending' => 'bg-amber-50 text-amber-700',
            'resolved' => 'bg-emerald-50 text-emerald-700',
            'closed' => 'bg-slate-100 text-slate-600',
            default => 'bg-slate-100 text-slate-600',
        };
    }
}
