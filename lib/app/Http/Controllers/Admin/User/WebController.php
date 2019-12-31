<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Http\Request;


class WebController extends Controller
{
     public function index()
    {
        $roles = Role::all();

        return view('page.admin.user.index', [
            'roles' => $roles
        ]);
    }
}
