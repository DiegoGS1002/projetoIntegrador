<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Client extends Model
{
    protected $table = 'clients';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'social_name',
        'taxNumber',
        'state_registration',
        'municipal_registration',
        'email',
        'phone_number',
        'website',
        'address_zip_code',
        'address_street',
        'address_number',
        'address_complement',
        'address_district',
        'address_city',
        'address_state',
        'latitude',
        'longitude',
        'status',
        'notes',
    ];
}
