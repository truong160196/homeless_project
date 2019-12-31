<?php

namespace App\Http\Controllers\Admin\Auction;

use App\Http\Controllers\Controller;
use App\Model\Auction;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebController extends Controller
{
     public function index()
    {
        return view('page.admin.auction.index');
    }

    public function create()
    {
        return view('page.admin.auction.createAuction');
    }

    public function update($id)
    {
        $auction = Auction::query()
            ->where('id', '=', $id)
            ->first();

        return view('page.admin.auction.updateAuction',
            ['auction' => $auction]);
    }
}
