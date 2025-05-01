<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{

    use HasFactory;

    protected $visible = ['id', 'name',];

    public function scopeTeam(Builder $query): void
    {
        $query->where('entidade_id', auth()->user()->entidade_id)->orderBy('name');
    }
}
