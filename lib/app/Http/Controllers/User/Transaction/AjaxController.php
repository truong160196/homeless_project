<?php

namespace App\Http\Controllers\User\Transaction;

use App\Http\Controllers\Controller;
use App\Model\Transactions;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class AjaxController extends Controller
{
   //
   public function withdraw(Request $request)
    {
        try {
            $data = Transactions::query()
                ->where('type','=', 'withdraw');

            return Datatables::of($data)
                ->editColumn('time_transaction', function ($v) {
                    if (!empty($v->time_transaction)) {
                        $time = date('Y-m-d', strtotime($v->time_transaction));
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
