<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'socialName',
        'taxNumber',
        'address_zip_code',
        'address_street',
        'address_number',
        'address_complement',
        'address_district',
        'address_city',
        'address_state',
        'latitude',
        'longitude',
        'telephone',
    ];

      protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';

    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_ACTIVE => 'Ativo',
            self::STATUS_INACTIVE => 'Inativo',
        ];
    }
    public function getStatusLabelAttribute(): string
    {
        return self::getStatusOptions()[$this->status] ?? ucfirst($this->status);
    }

    public function getFullAddress(): string
    {
        return trim(implode(', ', array_filter([
            $this->address_street,
            $this->address_number,
            $this->address_complement,
            $this->address_neighborhood,
            $this->address_city,
            $this->address_state,
            $this->address_zip_code,
        ])));
    }
}
