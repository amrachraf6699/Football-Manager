<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success' , 'تم تسجيل الخروج بنجاح');
    }
}
