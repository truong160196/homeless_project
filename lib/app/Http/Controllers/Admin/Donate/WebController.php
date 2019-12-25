<?php

namespace App\Http\Controllers\Admin\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function index()
    {
        return view('page.admin.donate.index');
    }

    public function create()
    {
        return view('page.admin.donate.createDonate');
    }
}
