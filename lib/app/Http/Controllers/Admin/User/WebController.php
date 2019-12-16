<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WebController extends Controller
{
     public function index()
    {
        return view('page.admin.user.index');
    }
}
