<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presentation extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','quantity','unit'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
