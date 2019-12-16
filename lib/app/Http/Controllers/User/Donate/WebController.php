<?php

namespace App\Http\Controllers\User\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function list()
    {
        return view('page.user.donate.list');
    }

    public function detail($id)
    {
        return view('page.user.donate.detail');
    }
}
