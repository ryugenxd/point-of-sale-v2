<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users');
    }

    public function table(Request $request):JsonResponse
    {
        $users = User::whereHas('role',function( Builder $query) use ($request){
            if($request->has('role_name')){
                $query -> where('name',$request->input('role_name'));
            }
        })->latest()->get();
        if($request->ajax()){
            return DataTables::of($users)->addColumn('action',function($data){
                $button = "<button class='update btn btn-success m-1' id='".$data->id."'><i class='fas fa-pen m-1'></i></button>";
                $button .= "<button class='delete btn btn-danger m-1' id='".$data->id."'><i class='fas fa-trash m-1'></i></button>";
                return $button;
            })
            ->rawColumns(['action'])
            -> make(true);
        }
    }
}
