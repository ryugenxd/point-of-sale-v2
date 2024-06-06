<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand_id',
        'type_id',
        'unit_id',
        'code',
        'image',
        'price',
        'quantity',
        'actived',
        'deleted'
    ];

    public function type():BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function brand():BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit():BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function goodsIns():HasMany
    {
        return $this->hasMany(GoodsIn::class);
    }

    public function goodsOuts():HasMany
    {
        return $this->hasMany(GoodsOut::class);
    }


}
