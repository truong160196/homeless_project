<?php

namespace App\Http\Controllers\User\Auction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class WebController extends Controller
{
     public function list()
    {
        $auctions = DB::table('auctions')
            ->orderBy('auction_start_time', 'asc')
            ->where('auction_start_time', '>', Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh')))
            ->paginate(4);

        $categories = DB::table('donate_categories')
            ->limit(6)
            ->get();
        
        return view('page.user.auction.list', [
                'auctions' => $auctions,
                'categories' => $categories,
            ]);
    }

    public function detail($id)
    {
        $auction = DB::table('auctions')
            ->where('id', $id)
            ->first();
        $type = 'new';
        $auctions_history = [];
        $current_price = $auction->auction_raised;

        if (!empty($auction)) {
            $take = 1;
            if ($auction->auction_start_time <= Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh')) && $auction->auction_end_time >= Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'))) {
                $type = 'auction';
                $take = 5;

            } else if ($auction->auction_end_time < Carbon::now(new \DateTimeZone('Asia/Ho_Chi_Minh'))) {
                $type = 'old';
            }

            $auctions_history = DB::table('auction_histories')
                ->where('auction_id', $auction->id)
                ->orderBy('value', 'desc')
                ->join('users', 'users.id', '=', 'auction_histories.user_id')
                ->take($take)
                ->select('users.full_name as name', 'auction_histories.value as value')
                ->get();

            if (count($auctions_history) > 0) {
                $current_price = $auctions_history[0]->value;
            }
        }

        return view('page.user.auction.detail', [
            'auction' => $auction, 
            'type' => $type,
            'auctions_history' => $auctions_history,
            'current_price' => $current_price,
        ]);
    }
}
