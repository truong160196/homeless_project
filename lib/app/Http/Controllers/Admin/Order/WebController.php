<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Role;

class WebController extends Controller
{
     public function index()
    {
        $roles = Role::all();
        return view('page.admin.order.index', [
            'roles' => $roles
        ]);
    }
}
