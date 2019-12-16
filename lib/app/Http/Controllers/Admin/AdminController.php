<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Pagination\Paginator;
use Aris\LaravelLocalization\Facades\LaravelLocalization;
use Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
     public function dashboard()
    {
        try {
            if (Auth::check()) {
                return view('page.admin.dashboard.index');
            } else {
                return redirect()->route('admin.page.login');
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.page.login');
        }
    }
}