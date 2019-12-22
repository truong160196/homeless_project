<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function home()
    {
        $auctions = DB::table('auctions')
            ->orderBy('auction_start_time', 'desc')
            ->limit(5)
            ->get();
        
        $donates_left = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->limit(1)
            ->get();

        $donates_right = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->skip(1)
            ->limit(3)
            ->get();

        return view('page.user.home.index', ['donates_left' => $donates_left, 'donates_right' => $donates_right, 'auctions' => $auctions]);
    }
}
