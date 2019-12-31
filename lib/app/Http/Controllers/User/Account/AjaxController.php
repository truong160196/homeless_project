<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Model\JoinTransactionsUser;
use App\Model\MUser;
use App\Model\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AjaxController extends Controller
{
    public function detail($id)
    {
        try {
            $data = MUser::query()
                ->where('id','=', $id)
                ->first();

            return response()
                ->json(['data' => $data]);
        } catch (\Exception $e) {
            return response()
                ->json(['msg' => 'Can find account'], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();


            $user = [
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'email' => $request->email,
                'address' => $request->address_user,
            ];

            DB::table('users')
                ->where('id','=', $request->id)
                ->update($user);

            DB::commit();
            return $this->JsonExport(200, 'Update user successfully');

        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function withdraw(Request $request)
    {
        try {
            DB::beginTransaction();

            $trnsactions = [
                'hash' => $request->hash,
                'block' => $request->block,
                'type' => 'withdraw',
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
            return $this->JsonExport(200, 'Withdraw token successfully');
        } catch (\Exception $e) {
            dd($e);
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function getFreeToken(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = JoinTransactionsUser::query()
                ->join('transactions', 'join_users_transactions.transaction_id','=', 'transactions.id')
                ->where('join_users_transactions.user_id', '=', $request->id)
                ->where('transactions.type', '=', 'get free token')
                ->first();

            if ($user) {
                return $this->JsonExport(500, 'The account has received free tokens');
            }

            $trnsactions = [
                'type' => 'get free token',
                'token' => $request->token,
                'amount' => $request->amount,
                'status' => 'pending',
                'time_transaction' => date("Y-m-d H:i:s")
            ];

            $id = DB::table('transactions')->insertGetId($trnsactions);

            if (!$id) {
                return $this->JsonExport(500, 'The request was denied');
            }

            $transaction_user = [
                'user_id' => $request->id,
                'transaction_id' => $id
            ];

            JoinTransactionsUser::create($transaction_user);

            DB::commit();
            return $this->JsonExport(200, 'Token will be deposited after Admin approve.');
        } catch (\Exception $e) {
            dd($e);
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
