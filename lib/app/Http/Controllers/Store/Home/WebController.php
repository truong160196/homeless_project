<?php

namespace App\Http\Controllers\Store\Home;

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

class WebController extends Controller
{
     public function index()
    {
        return view('page.store.home.index');
    }
}
