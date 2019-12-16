<?php

namespace App\Http\Controllers\Admin\Auction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function list()
    {
        return view('page.admin.auction.index');
    }
}
