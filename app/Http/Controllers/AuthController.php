<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function logout(){
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with('success','Logged out successfully');
    }
}
