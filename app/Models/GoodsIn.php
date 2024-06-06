<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoodsIn extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'supplier_id',
        'product_id',
        'quantity',
        'date_received',
        'invoice_number',
        'description',
        'deleted',
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
