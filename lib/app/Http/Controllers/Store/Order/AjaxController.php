<?php

namespace App\Http\Controllers\Store\Order;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Yajra\DataTables\DataTables;

use Web3\Web3;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;
use Web3\Utils;

class AjaxController extends Controller
{

    public function __construct()
    {
        $url = 'https://ropsten.infura.io/v3/cde205b23d7d4a998f4ee02f652355b0';
        $this->web3 = new Web3(new HttpProvider(new HttpRequestManager($url,  30)));
    }

    public function list()
    {
        try {
            $data = Order::query();

            return Datatables::of($data)
                          ->addColumn('action', function ($v) {
                    $action = '';
                    $action .= '<span data-toggle="tooltip" data-placement="top" title="View detail caterer" class="btn-action table-action-view cursor-pointer tx-info" data-id="' . $v->id . '"><i class="far fa-view"></i></span>';

                    return $action;
                })
                ->editColumn('order_total', function ($v) {
                    if (!empty($v->order_total)) {
                        return '$' . number_format($v->order_total, 0);
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        } catch (\Exception $e) {
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

    public function order(Request $request)
    {
        $rules = array(
            'data' => 'required',
            'total' => 'required',
            'address' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->JsonExport(403, __('app.error_403'));
        } else {
            try {
                DB::beginTransaction();
                if (!$request->data) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not payment this transaction');
                }

                $order = [
                    'order_total' => $request->total,
                    'order_tax' => $request->tax,
                    'order_address' => $request->address,
                    'hash' => $request->hash,
                    'status' => 'success',
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $id = DB::table('orders')->insertGetId($order);

                if (!$id) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not payment this order');
                }

                $products = json_decode($request->data, true);

                $orderHistory = [];

                foreach ($products as $product) {
                    array_push($orderHistory, [
                        'order_id' => $id,
                        'product_id' => $product['id'],
                        'quantity' => $product['qty'],
                        'price' => $product['price'],
                    ]);
                }

                $result = DB::table('join_orders_products')->insert($orderHistory);

                if (!$result) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not payment this order');
                }

                DB::commit();
                return $this->JsonExport(200, 'Payment successfully');

            } catch (\Exception $e) {
                return $this->JsonExport(500, 'Internal Server Error');
            }
        }
    }

    public function getBalance(Request $request) {
        try {
            $eth = $this->web3->eth;

            $eth->getBalance('0xaC8832ae0C56f638bC07822f90b24A4f8d721B2D', function ($err, $result) {
                if ($err) {
                    return $this->JsonExport(404, 'Can not get balance');
                }

                $balace = Utils::fromWei($result->value, 'ether');
                if ($balace && count($balace) === 2) {
                    $this->balaceFormat = $balace[0]->toString() . '.' . $balace[1]->toString();
                }

                return $this->JsonExport(200, 'Can not receive balance token');
            });

            return $this->JsonExport(200, $this->balaceFormat);
        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
