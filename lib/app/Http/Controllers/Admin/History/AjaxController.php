<?php

namespace App\Http\Controllers\Admin\History;

use App\Http\Controllers\Controller;
use App\Model\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class AjaxController extends Controller
{
   //
    public function list(Request $request)
    {
        try {
            $data = Transactions::query();

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
