<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuctionController extends Controller
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
