<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function login(Request $request)
    {
        try {
//            $user = auth()->user();

//            dd($user->role->name);
            if (Auth::check()) {
                return redirect()->route('admin.page.dashboard');
            } else {
                return view('page.account.login');
            }
        } catch (\Exception $e) {
            return redirect()->route('account.page.login');
        }
    }

    public function register(Request $request)
    {
        return view('page.account.register');
    }
}
