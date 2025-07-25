<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name'
    ];

    public function vouchers(): HasMany
    {
        return $this->hasMany(Voucher::class);
    }
}
