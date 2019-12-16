<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Aris\LaravelLocalization\Facades\LaravelLocalization;
use Validator;

class AdminController extends Controller
{
     public function dashboard()
    {
        try {
            if (Auth::check()) {
                return view('page.admin.dashboard.index');
            } else {
                return redirect()->route('account.page.login');
            }
        } catch (\Exception $e) {
            return redirect()->route('account.page.login');
        }
    }
}