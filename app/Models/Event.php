<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'date_event' => 'datetime',
    ];

    public function scopeEvents(Builder $query): void
    {
        $query->select('id', 'name')
            ->where('entidade_id', auth()->user()->entidade_id)
            ->orderBy('name');
    }
}
