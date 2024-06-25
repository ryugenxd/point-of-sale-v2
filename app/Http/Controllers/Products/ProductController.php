<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ResponService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


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

    public function detail(int $id):JsonResponse
    {
        $product = Product::find($id);
        if(!$product){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        return response()->json(
            ['data'=>$product]
        )->setStatusCode(200);
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

    public function update(UpdateProductRequest $request,int $id):JsonResponse
    {
        $data = $request -> validated();
        $product = Product::find($id);

        if(!$product){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }

        $product -> brand_id = $data['brand_id'];
        $product -> type_id = $data['type_id'];
        $product -> unit_id = $data['unit_id'];
        $product -> name = $data['name'];
        $product -> code = $data['code'];
        $product -> price = $data['price'];
        $product -> quantity = $data['quantity'];
        if($request->file('image') != null){
            if(Storage::disk('local')->exists('public/products/'.$product->image)){
                Storage::delete('public/products/'.$product->image);
            }
            $image = $request->file('image');
            $image->storeAs('public/products/', $image->hashName());
            $image = $image->hashName();
            $product -> image =  $image;
        }
        $status = $product -> save();
        return ResponService::update($status);
    }

    public function delete(int $id):JsonResponse
    {
        $product = Product::find($id);
        if(!$product){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        if(Storage::disk('local')->exists('public/products/'.$product->image)){
            Storage::delete('public/products/'.$product->image);
        }
        $status = $product -> delete();
        return ResponService::delete($status);
    }

}
