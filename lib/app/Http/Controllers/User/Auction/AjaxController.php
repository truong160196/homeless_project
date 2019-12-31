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
        $auctions_history = DB::table('auction_histories')
            ->where('auction_id', $request->id)
            ->orderBy('value', 'desc')
            ->join('users', 'users.id', '=', 'auction_histories.user_id')
            ->take(6)
            ->select('users.full_name as name', 'auction_histories.value as value')
            ->get();
    
        return \Response::json($auctions_history);
    }

    public function binding(Request $request)
    {
        $user_id = 1;
        $message = 'success';

        try {
            DB::table('auction_histories')->insert(
                ['auction_id' => $request->id, 'user_id' => $user_id, 'value' => $request->value]
            );
        } catch (Exception $e){
            $message = "Server error!";
        }

        return \Response::json($message);
    }
}
