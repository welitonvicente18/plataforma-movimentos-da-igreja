<?php

namespace App\Models;

use App\Enums\MembersTypes;
use App\Enums\MembersStatus;
use App\Enums\YesNo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use HasFactory, softDeletes;

    protected $casts = [
        'type' => MembersTypes::class,
        'status' => MembersStatus::class,
        'batizado' => YesNo::class,
        'crismado' => YesNo::class,
    ];
    protected $fillable = [
        'name',
        'surname',
        'status',
        'event',
        'circle',
        'entidade_id',
        'sex',
        'type',
        'telephone',
        'birth_date',
        'batizado',
        'crismado',
        'uf',
        'city',
        'address',
        'photo',
        'team',
        'observation',
        'user_id',
    ];

    public function entidadeRelationsShip()
    {
        return $this->belongsTo(Entidade::class, 'entidade_id', 'id');
    }

    public function userRelationsShip()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function telephone(): Attribute
    {
        return new Attribute(
            get: fn (string $value): string => preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $value),
            set: fn (string $value): string => preg_replace('/[^0-9]/', '', $value),
        );
    }

}
