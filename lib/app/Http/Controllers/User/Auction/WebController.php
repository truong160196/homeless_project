<?php

namespace App\Http\Controllers\User\Auction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function list()
    {
        return view('page.user.auction.list');
    }

    public function detail($id)
    {
        return view('page.user.auction.detail');
    }
}
