<?php

namespace App\Http\Controllers\Admin\Donate;

use App\Http\Controllers\Controller;
use App\Model\Donate;
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

    public function update($id)
    {
        $donate = Donate::query()
            ->where('id', '=', $id)
            ->first();

        return view('page.admin.donate.updateDonate',
        ['donate' => $donate]);
    }

}
