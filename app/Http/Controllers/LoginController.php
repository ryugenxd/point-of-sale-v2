<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('login');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if(empty($data['remember'])){
            $data['remember']='off';
        }
        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']],$data['remember']=='on'?true:false)) {
            return redirect()->route('dashboard')->with('sukses','Login Berhasil');
        }
        return redirect()->route('login')->with('gagal','Username atau password salah.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
