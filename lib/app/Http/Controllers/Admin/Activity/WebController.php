<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WebController extends Controller
{
     public function index()
    {
        return view('page.admin.setting.index');
    }
}
