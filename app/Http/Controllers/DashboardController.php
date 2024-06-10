<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use App\Services\ProductsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\UsersService;


class DashboardController extends Controller
{

    public function index(): View
    {
        $users = UsersService::counter();
        $customers = Customer::get()->count();
        $suppliers = Supplier::get()->count();
        $products = ProductsService::counterAll();
        return view('dashboard',compact('users','customers','suppliers','products'));
    }
}
