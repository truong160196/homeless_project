<?php

namespace App\Http\Controllers\User\Auction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WebController extends Controller
{
     public function list()
    {
        $auctions = DB::table('donate_history')
            ->orderBy('auction_start_time', 'asc')
            ->where('auction_start_time', '>', Carbon::now())
            ->paginate(4);
        
        return view('page.user.auction.list', ['auctions' => $auctions]);
    }

    public function detail($id)
    {
        return view('page.user.auction.detail');
    }
}
