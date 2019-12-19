<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
     public function home()
    {
        $auctions = DB::table('donate_history')
            ->orderBy('auction_start_time', 'desc')
            ->limit(5)
            ->get();
        
        $donates_left = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->limit(2)
            ->get();

        $donates_right = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->skip(2)
            ->limit(2)
            ->get();

        return view('page.user.home.index', ['donates_left' => $donates_left, 'donates_right' => $donates_right, 'auctions' => $auctions]);
    }
}
