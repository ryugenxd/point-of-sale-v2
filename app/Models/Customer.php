<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    protected $filleable = [
        "name",
        "image",
        "phone",
        "address",
    ];
    public function goodsOuts():HasMany
    {
        return $this -> hasMany(GoodsOut::class);
    }
}
