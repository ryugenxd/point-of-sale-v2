<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Exceptions\HttpResponseException;

class CustomerController extends Controller
{
    public function index():View
    {
        return view('customers');
    }

    public function tabel(Request $request):JsonResponse
    {
        $customers = Customer::latest()->get();
        if($request -> ajax()){
            return DataTables::of($customers)
            ->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }

    public function save(CreateCustomerRequest $request): JsonResponse
    {
        $customers = new Customer();
        $customers -> name = $request->name;
        $customers -> phone = $request->phone;
        $customers -> address = $request->address;
        $status = $customers -> save();
        if(!$status){
            return response()->json(
                ["message"=>"Gagal di simpan"]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>"Berhasil di simpan."
        ]) -> setStatusCode(200);
    }

    public function detail(int $id): JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            throw new HttpResponseException(response()->json(["message"=>"not found."])->setStatusCode(404));
        }
        return response()->json(
            ["data"=>$customer]
        )->setStatusCode(200);
    }

    public function update(UpdateCustomerRequest $request,int $id): JsonResponse
    {
        $data = $request->validated();
        $customer = Customer::find($id);
        if(!$customer){
            throw new HttpResponseException(response()->json(["message"=>"not found."])->setStatusCode(404));
        }
        $customer -> name = $data['name'];
        $customer -> phone = $data['phone'];
        $customer -> address = $data['address'];
        $status = $customer -> save();
        if(!$status){
            return response()->json(
                ["message"=>__("Gagal mengubah data")]
            )->setStatusCode(400);
        }
        return response() -> json([
            "message"=>__("Berhasil mengubah data")
        ]) -> setStatusCode(200);
    }

    public function delete(int $id): JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            throw new HttpResponseException(response()->json(["message"=>"not found."])->setStatusCode(404));
        }
        $status = $customer -> delete();
        if(!$status){
            return response()->json(
                ["message"=>__("Gagal menghapus data")]
            )->setStatusCode(400);
        }
        return response()->json([
            "message"=>__("Berhasil menghapus data")
        ]) -> setStatusCode(200);
    }
}
