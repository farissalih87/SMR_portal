<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //
    public function getLogin(){

        return view('admin.login');

    }
    public function Login(AdminLogin  $request){

        if(!Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
        throw ValidationException::withMessages([
            'email'=>'Wrong email or password.',
        ]);
        }
        return redirect()->intended(route('admin.home'));

    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
