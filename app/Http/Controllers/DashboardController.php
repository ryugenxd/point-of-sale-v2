<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use App\Models\User;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UsersService;


class DashboardController extends Controller
{

    public function index(): View
    {
        $users = UsersService::counter();
        $user_all = User::get()->count();
        $customers = Customer::get()->count();
        $suppliers = Supplier::get()->count();
        $products = ProductsService::counterAll();
        return view('dashboard',compact('users','user_all','customers','suppliers','products'));
    }
}
