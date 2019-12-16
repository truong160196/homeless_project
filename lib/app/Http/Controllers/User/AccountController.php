<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AccountController extends Controller
{
     public function index()
    {
        return view('page.user.account.index');
    }

    public function deposit()
    {
        return view('page.user.account.deposit');
    }

    public function withdraw()
    {
        return view('page.user.account.withdraw');
    }

    public function setting()
    {
        return view('page.user.account.setting');
    }
}
