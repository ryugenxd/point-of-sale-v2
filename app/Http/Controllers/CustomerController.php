<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\ResponService;
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

    public function table(Request $request):JsonResponse
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
        $data = $request->validated();
        $customer = new Customer();
        $customer-> name = $data['name'];
        $customer -> phone = $data['phone'];
        $customer -> address = $data['address'];
        $status = $customer -> save();
        return ResponService::save($status);
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
        return ResponService::update($status);
    }

    public function delete(int $id): JsonResponse
    {
        $customer = Customer::find($id);
        if(!$customer){
            throw new HttpResponseException(response()->json(["message"=>"not found."])->setStatusCode(404));
        }
        $status = $customer -> delete();
        return ResponService::delete($status);
    }
}
