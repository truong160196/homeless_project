<?php

namespace App\Http\Controllers\User\Auction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AjaxController extends Controller
{
   //
   public function top_auction(Request $request)
    {  
         $auctions = DB::table('auctions')
            ->orderBy('auction_start_time', 'desc')
            ->limit(5)
            ->get();
    
        return \Response::json($auctions);
    }
}
