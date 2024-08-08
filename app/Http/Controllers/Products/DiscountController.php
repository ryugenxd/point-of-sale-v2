<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Illuminate\View\View;
use App\Models\Discount;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Services\ResponService;
use Illuminate\Http\Exceptions\HttpResponseException;


class DiscountController extends Controller
{
    public function index():View
    {
        return view('products.discount');
    }

    public function table(Request $request):JsonResponse
    {
        $discounts = Discount::latest()->get();
        if($request->ajax()){
            return DataTables::of($discounts)
            ->addColumn("action",function($data){
                $button = "<button class='update btn btn-success m-2' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(["action"])
            ->make(true);
        }
    }

    public function save(CreateDiscountRequest $request):JsonResponse
    {
        $data = $request->validated();
        $discount = new Discount();
        $discount -> percentage = $data -> percentage;
        $discount -> amount = $data -> amount;
        $discount -> start_date = $data -> start_date;
        $discount -> end_date = $data -> end_date;
        $status = $discount -> save();
        return ResponService::save($status);
    }

    public function detail(int $id):JsonResponse
    {
        $discount = Discount::find($id);
        if(!$discount){
            throw new HttpResponseException(response()->json([
                "message"=>[
                    "not found."
                ]
            ])->setStatusCode(404));
        }
        return response()->json([
            "data"=>$discount
        ])->setStatusCode(200);
    }

    public function update(UpdateDiscountRequest $request,int $id):JsonResponse
    {
        $data = $request -> validated();
        $discount = Discount::find($id);
        if(!$discount){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        $discount -> percentage = $data -> percentage;
        $discount -> amount = $data -> amount;
        $discount -> start_date = $data -> start_date;
        $discount -> end_date = $data -> end_date;
        $status = $discount -> save();
        return ResponService::update($status);
    }

    public function delete(int $id):JsonResponse
    {
        $discount = Discount::find($id);
        if(!$discount){
            throw new HttpResponseException(response()->json([
                'message'=>'not found.'
            ])->setStatusCode(404));
        }
        $status = $discount -> save();
        return ResponService::delete($status); 
    }
}
