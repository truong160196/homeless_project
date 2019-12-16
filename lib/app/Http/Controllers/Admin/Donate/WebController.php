<?php

namespace App\Http\Controllers\Admin\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function list()
    {
        return view('page.admin.donate.index');
    }
}
