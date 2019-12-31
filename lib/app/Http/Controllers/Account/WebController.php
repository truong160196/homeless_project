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
            $user = auth()->user();

            if (Auth::check()) {
                if ($user->role->name === 'System Admin') {
                    return redirect()->route('admin.page.auction');
                }

                if ($user->role->name === 'User') {
                    return redirect()->route('user.page.account');
                }

                if ($user->role->name === 'Homeless') {
                    return redirect()->route('user.page.account');
                }

                if ($user->role->name === 'Store') {
                    return redirect()->route('store.page.home');
                }
            } else {
                return view('page.account.login');
            }
        } catch (\Exception $e) {
            return view('page.account.login');
        }
    }

    public function register(Request $request)
    {
        try {
            $user = auth()->user();

            if (Auth::check()) {
                if ($user->role->name === 'System Admin') {
                    return redirect()->route('admin.page.dashboard');
                }

                if ($user->role->name === 'User') {
                    return redirect()->route('user.page.account');
                }

                if ($user->role->name === 'Homeless') {
                    return redirect()->route('user.page.account');
                }

                if ($user->role->name === 'Store') {
                    return redirect()->route('store.page.store.account');
                }
            } else {
                return view('page.account.register');
            }
        } catch (\Exception $e) {
            return redirect()->route('account.page.login');
        }
    }

    public function logout () {
        try {
            if (Auth::user()) {
                Auth::logout();
            }
            session()->flush();
            return redirect()->route('account.page.login');
        } catch (\Exception $e) {
            return redirect()->route('account.page.login');
        }
    }
}
