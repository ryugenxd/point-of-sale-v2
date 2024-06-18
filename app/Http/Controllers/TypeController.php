<?php

namespace App\Http\Controllers;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Requests\CreateTypeRequest;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;
use App\Services\ResponService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Type;



class TypeController extends Controller
{
    public function index(): View
    {
        return view('goods.type');
    }

    public function tabel(Request $request):JsonResponse
    {
        $types = Type::latest()->get();
        if($request->ajax()){
            return DataTables::of($types)
            ->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }

    // detail
    public function detail(int $id):JsonResponse
    {
        $type = Type::find($id);
        if(!$type) {
            throw new HttpResponseException(response()->json([
                "message"=>"not found."
            ])->setStatusCode(404));
        }
        return response()->json([
            "data"=>$type
        ])->setStatusCode(200);
    }

    // save
    public function save(CreateTypeRequest $request): JsonResponse
    {
        $data = $request->validated();
        $type = new Type();
        $type -> name = $data['name'];
        $type -> description = $data['description'];
        $status = $type -> save();
        return ResponService::save($status);
    }

    // update
    public function update(UpdateTypeRequest $request, int $id):JsonResponse
    {
        $data = $request -> validated();
        $type = Type::find($id);
        if(!$type){
            throw new HttpResponseException(response()->json([
                "message"=>[
                    "not found."
                ]
            ])->setStatusCode(404));
        }
        $type -> name = $data['name'];
        $type -> description = $data['description'];
        $status = $type -> save();
        return ResponService::update($status);
    }

    // delete
    public function delete(int $id):JsonResponse
    {
        $type = Type::find($id);
        if(!$type){
            throw new HttpResponseException(response()->json([
                "message"=>[
                    "not found."
                ]
            ])->setStatusCode(404));
        }
        $status = $type->delete();
        return ResponService::delete($status);
    }
}
