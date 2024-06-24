<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Services\ResponService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\View\View;


class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index');
    }

    public function table(Request $request):JsonResponse
    {
        $products = Product::latest()->get();
        if($request->ajax()){
            return DataTables::of($products)
            ->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }

    public function save(CreateProductRequest $request):JsonResponse
    {
        $data = $request -> validated();
        $product = new Product();
        $product -> brand_id = $data['brand_id'];
        $product -> type_id = $data['type_id'];
        $product -> unit_id = $data['unit_id'];
        $product -> name = $data['name'];
        $product -> code = $data['code'];
        $product -> price = $data['price'];
        $product -> quantity = $data['quantity'];
        if($request->file('image') != null){
            $image = $request->file('image');
            $image->storeAs('public/products/', $image->hashName());
            $image = $image->hashName();
            $product -> image =  $image;
        }
        $status = $product -> save();
        return ResponService::save($status);
    }


}
