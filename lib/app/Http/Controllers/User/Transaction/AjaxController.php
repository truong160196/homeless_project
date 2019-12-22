<?php

namespace App\Http\Controllers\User\Transaction;

use App\Http\Controllers\Controller;
use App\Model\Transactions;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AjaxController extends Controller
{
   //
    public function history(Request $request)
    {
        try {
            $data = Transactions::query()
                ->join('join_users_transactions', 'join_users_transactions.transaction_id','=', 'transactions.id')
                ->where('join_users_transactions.user_id', '=', $request->id);

            return Datatables::of($data)
                ->editColumn('time_transaction', function ($v) {
                    if (!empty($v->time_transaction)) {
                        $time = date('Y-m-d H:i:s', strtotime($v->time_transaction));
                        return $time;
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['time_transaction'])
                ->make(true);
        } catch (\Exception $e) {
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

   public function withdraw(Request $request)
    {
        try {
            $data = Transactions::query()
                ->join('join_users_transactions', 'join_users_transactions.transaction_id','=', 'transactions.id')
                ->where('transactions.type','=', 'withdraw')
                ->where('join_users_transactions.user_id', '=', $request->id);

            return Datatables::of($data)
                ->editColumn('time_transaction', function ($v) {
                    if (!empty($v->time_transaction)) {
                        $time = date('Y-m-d H:i:s', strtotime($v->time_transaction));
                        return $time;
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['time_transaction'])
                ->make(true);
        } catch (\Exception $e) {
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

    public function deposit(Request $request)
    {
        try {
            $data = Transactions::query()
                ->join('join_users_transactions', 'join_users_transactions.transaction_id','=', 'transactions.id')
                ->whereIn('transactions.type',['deposit', 'get free token'])
                ->where('join_users_transactions.user_id', '=', $request->id);

            return Datatables::of($data)
                ->editColumn('time_transaction', function ($v) {
                    if (!empty($v->time_transaction)) {
                        $time = date('Y-m-d H:i:s', strtotime($v->time_transaction));
                        return $time;
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['time_transaction'])
                ->make(true);
        } catch (\Exception $e) {
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }
}
