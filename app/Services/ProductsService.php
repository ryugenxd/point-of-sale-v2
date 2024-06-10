<?php
namespace App\Services;

use App\Models\Brand;
use App\Models\Product;

class ProductsService {
    public static function counterAll():int
    {
        return Product::get()->count();
    }

    public static function counter():array
    {
        $brands = Brand::get()->all();
        $products = [];
        foreach($brands as $brand){
            array_push($products,["name"=>$brand->name,"count"=>Product::where('brand_id',$brand->id)->count()]);
        }
        return $products;
    }
}
