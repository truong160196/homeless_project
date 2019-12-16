<?php

namespace App\Http\Controllers\Store;

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

class StoreController extends Controller
{
     public function home()
    {
        return view('page.store.index');
    }
}
