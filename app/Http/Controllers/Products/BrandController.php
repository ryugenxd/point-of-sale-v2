<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Services\ResponService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function index():View
    {
        return view('products.brand');
    }

    public function table(Request $request):JsonResponse
    {
        $brands = Brand::latest()->get();
        if($request->ajax()){
            return DataTables::of($brands)
            ->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }

    public function save(CreateBrandRequest $request):JsonResponse
    {
        $data = $request -> validated();
        $brand = new Brand();
        $brand -> name = $data['name'];
        $brand -> description = $data['description'];
        $status = $brand -> save();
        return ResponService::save($status);
    }

    public function detail(int $id): JsonResponse
    {
        $brand = Brand::find($id);
        if(!$brand){
            throw new HttpResponseException(response()->json([
                "message"=>[
                    "not found."
                ]
            ])->setStatusCode(404));
        }

        return response()->json([
            "data"=>$brand
        ])->setStatusCode(200);
    }

    public function update(UpdateBrandRequest $request, int $id): JsonResponse
    {
        $data = $request -> validated();
        $brand = Brand::find($id);
        if(!$brand){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        $brand -> name = $data['name'];
        $brand -> description = $data['description'];
        $status = $brand -> save();
        return ResponService::update($status);
    }

    public function delete(int $id): JsonResponse
    {
        $brand = Brand::find($id);
        if(!$brand){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        $status = $brand -> delete();
        return ResponService::delete($status);
    }
}
