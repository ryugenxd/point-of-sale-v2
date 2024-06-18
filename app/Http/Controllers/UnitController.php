<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UnitController extends Controller
{
    public function index(): View
    {
        return view('goods.unit');
    }

    public function tabel(Request $request): JsonResponse
    {

    }
}
