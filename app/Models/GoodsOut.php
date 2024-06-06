<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoodsOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'customer_id',
        'product_id',
        'quantity',
        'invoice_number',
        'date_out',
        'description',
        'deleted'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product():BelongsTo
    {
        return $this -> belongsTo(Product::class);
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
