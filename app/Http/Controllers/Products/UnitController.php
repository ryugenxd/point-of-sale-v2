<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUnitRequest;
use App\Models\Unit;
use App\Services\ResponService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('products.unit');
    }

    public function table(Request $request): JsonResponse
    {
        $units = Unit::latest()->get();
        if($request->ajax()){
            return DataTables::of($units)
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
        $unit = Unit::find($id);
        if(!$unit){
            throw new HttpResponseException(response()->json([
                "message"=>"not found."
            ])->setStatusCode(404));
        }

        return response()->json([
            "data"=>$unit
        ])->setStatusCode(200);
    }

    public function save(CreateUnitRequest $request):JsonResponse
    {
        $data = $request->validated();
        $unit = new Unit();
        $unit -> name = $data['name'];
        $unit -> description = $data['description'];
        $status = $unit -> save();
        return ResponService::save($status);
    }


}
