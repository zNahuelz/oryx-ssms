<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'image',
        'buy_price',
        'sell_price',
        'stock',
        'stock_min',
        'visible'
    ];

    public function presentation(): BelongsTo
    {
        return $this->belongsTo(Presentation::class);
    }
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function voucherDetails(): HasMany
    {
        return $this->hasMany(VoucherDetail::class);
    }
}
