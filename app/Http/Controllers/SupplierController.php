<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use App\Services\ResponService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    public function index(): View
    {
        return view('suppliers');
    }

    public function tabel(Request $request):JsonResponse
    {
        $suppliers = Supplier::latest()->get();
        if($request->ajax()){
            return DataTables::of($suppliers)->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }

    public function save(CreateSupplierRequest $request):JsonResponse
    {
        $data = $request->validated();
        $supplier = new Supplier();
        $supplier -> name = $data['name'];
        $supplier -> phone = $data['phone'];
        $supplier -> email = $data['email'];
        $supplier -> website = $data['website'];
        $supplier -> address = $data['address'];
        $status = $supplier -> save();
        return ResponService::save($status);
    }

    public function detail(int $id): JsonResponse
    {
        $supplier = Supplier::find($id);
        if(!$supplier){
            throw new HttpResponseException(response()->json(["message"=>"not found."])->setStatusCode(404));
        }
        return response()->json(
            ["data"=>$supplier]
        )->setStatusCode(200);
    }

    public function update(UpdateSupplierRequest $request, int $id): JsonResponse
    {
        $data = $request -> validated();
        $supplier = Supplier::find($id);
        if(!$supplier){
            throw new HttpResponseException(response()->json(['message'=>'not found,'])->setStatusCode(404));
        }
        $supplier -> name = $data['name'];
        $supplier -> phone = $data['phone'];
        if(!is_null($data['email'])){
            $supplier -> email = $data['email'];
        }
        if(!is_null($data['website'])){
            $supplier -> website = $data['website'];
        }
        $supplier -> address = $data['address'];
        $status = $supplier -> save();

        return ResponService::update($status);
    }

    // mencari data berdasarkan id
    // mengirim respon not found jika data  tidak di temukan
    // mengapus data jika di temukan
    // mengirim respon status hapus

    public function delete(int $id):JsonResponse
    {
        $supplier = Supplier::find($id);
        if(!$supplier){
            throw new HttpResponseException(response()->json(['message'=>'not found.'])->setStatusCode(404));
        }
        $status = $supplier -> delete();
        return ResponService::delete($status);
    }

}
