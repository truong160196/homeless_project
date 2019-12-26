<?php

namespace App\Http\Controllers\User\Donate;

use App\Http\Controllers\Controller;
use App\Model\JoinTransactionsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AjaxController extends Controller
{
   //
   public function top_donate(Request $request)
    {  
         $donates = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->limit(2)
            ->get();
    
        return \Response::json($donates);
    }

    public function donate(Request $request)
    {
        try {
            DB::beginTransaction();

            $trnsactions = [
                'hash' => $request->hash,
                'block' => $request->block,
                'type' => 'donate',
                'token' => $request->token,
                'amount' => $request->amount,
                'fee' => $request->fee,
                'status' => 'complete',
                'time_transaction' => date("Y-m-d H:i:s")
            ];

            $id = DB::table('transactions')->insertGetId($trnsactions);

            if (!$id) {
                return $this->JsonExport(500, 'Save information transaction error');
            }

            $transaction_user = [
                'user_id' => $request->id,
                'transaction_id' => $id
            ];

            JoinTransactionsUser::create($transaction_user);

            DB::commit();
            return $this->JsonExport(200, 'You are donate successfully');
        } catch (\Exception $e) {
            dd($e);
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
