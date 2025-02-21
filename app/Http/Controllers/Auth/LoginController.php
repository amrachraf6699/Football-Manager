<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        if(auth()->attempt($request->validated())) {
            return redirect()->route(('dashboard.home'))->with('success', 'مرحبا بعودتك');
        }

        return back()->with('error', 'رقم الهاتف او كلمة المرور غير صحيحة');
    }
}
