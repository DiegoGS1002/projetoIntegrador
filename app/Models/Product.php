<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// Precisa importar BelongsToMany aqui!
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Importar BelongsTo
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
// Importar BelongsToMany
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Product extends Model
{
   use HasFactory, HasUuids, SoftDeletes;

    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected static function booted()
        {
            static::creating(function ($model) {
                $model->id = Str::uuid();
            });
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Supplier', // <-- Adicionar fornecedor aqui
        'name',
        'sku',
        'description',
        'unit_of_measure',
        'standard_cost',
        'sale_price',
        'minimum_sale_price',
        'stock'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sale_price' => 'decimal:2',
    ];
}
