<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class GoodsController extends Controller
{
    public function index(): View
    {
        return view('goods.index');
    }
}
