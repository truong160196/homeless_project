<?php

namespace App\Http\Controllers\Admin\Auction;

use App\Http\Controllers\Controller;
use App\Model\Auction;
use App\Model\Donate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Validator;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{

    public function list()
    {
        try {
            $data = Auction::query();

            return Datatables::of($data)
                 ->editColumn('auction_start_time', function ($v) {
                    if (!empty($v->auction_start_time)) {
                        return Carbon::createFromFormat("Y-m-d H:i:s", $v->auction_start_time)->format("Y-m-d");
                    } else {
                        return '';
                    }
                })

                ->editColumn('auction_end_time', function ($v) {
                    if (!empty($v->auction_end_time)) {
                        return Carbon::createFromFormat("Y-m-d H:i:s", $v->auction_end_time)->format("Y-m-d");
                    } else {
                        return '';
                    }
                })

                ->editColumn('auction_raised', function ($v) {
                    if (!empty($v->auction_raised)) {
                        return number_format($v->auction_raised, 0);
                    } else {
                        return '';
                    }
                })

                ->addColumn('actions', function ($v) {
                    $action = '';
                    $action .= '<a href="'
                        . route('admin.page.auction.update', ['id' => $v->id])
                        .'" data-toggle="tooltip" data-placement="top" title="View detail Fund" class="btn-action table-action-view cursor-pointer tx-info" data-id="'
                        . $v->id . '"><i class="far fa-edit"></i></a>';

                    return $action;
                })
                ->rawColumns(['category', 'actions'])
                ->make(true);
        } catch (\Exception $e) {
            dd($e);
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

    public function create(Request $request)
    {
        $rules = array(
            'auction_title' => 'required',
            'address' => 'required',
            'privateKey' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->JsonExport(403, 'Please check validate form');
        } else {
            try {
                DB::beginTransaction();
                $path = $this->upload($request);
                if (!$path) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not create fund');
                }

                $start_date = Carbon::createFromFormat('Y/m/d', $request->start_date)->format('Y-m-d');
                $end_date = Carbon::createFromFormat('Y/m/d', $request->end_date)->format('Y-m-d');

                $donates = [
                    'auction_title' => $request->auction_title,
                    'auction_detail' => $request->auction_detail,
                    'auction_content' => $request->auction_content,
                    'auction_start_time' => $start_date,
                    'auction_end_time' => $end_date,
                    'auction_raised' => $request->raised,
                    'donate_address' => $request->address,
                    'donate_private_key' => $request->privateKey,
                    'donate_public_key' => $request->publicKey,
                    'product_title' => $request->product_title,
                    'product_detail' => $request->product_detail,
                    'production_author' => $request->production_author,
                    'product_image' => $path,
                ];

                $id = Auction::create($donates);

                if (!$id) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not create fund');
                }

                DB::commit();
                return $this->JsonExport(200, 'Create Fund successfully');

            } catch (\Exception $e) {
                dd($e);
                return $this->JsonExport(500, 'Internal Server Error');
            }
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'donate_id' => 'required',
            'donate_title' => 'required',
            'address' => 'required',
            'privateKey' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->JsonExport(403,'Please check validate form');
        } else {
            try {
                DB::beginTransaction();
                $donate = Donate::find($request->donate_id);

                if (!$donate) {
                    return $this->JsonExport(404, 'Can not update fund');
                }

                $path = $this->upload($request);
                if ($path) {
                    $donate->donate_image = $path;
                }

                if ($request->donate_title) {
                    $donate->donate_title = $request->donate_title;
                }

                if ($request->donate_detail) {
                    $donate->donate_detail = $request->donate_detail;
                }

                if ($request->start_date) {
                    $start_date = Carbon::createFromFormat('Y/m/d', $request->start_date)->format('Y-m-d');
                    $donate->donate_start_time = $start_date;
                }

                if ($request->end_date) {
                    $end_date = Carbon::createFromFormat('Y/m/d', $request->end_date)->format('Y-m-d');

                    $donate->donate_end_time = $end_date;
                }

                if ($request->donate_goal) {
                    $donate->donate_goal = $request->donate_goal;
                }

                if ($request->donate_address) {
                    $donate->donate_address = $request->donate_address;
                }

                if ($request->donate_private_key) {
                    $donate->donate_private_key = $request->donate_private_key;
                }

                if ($request->donate_public_key) {
                    $donate->donate_public_key = $request->donate_public_key;
                }

                if ($request->category_id) {
                    $donate->category_id = $request->category_id;
                }

                $result = $donate->save();

                if (!$result) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not create fund');
                }

                DB::commit();
                return $this->JsonExport(200, 'Create Fund successfully');

            } catch (\Exception $e) {
                dd($e);
                return $this->JsonExport(500, 'Internal Server Error');
            }
        }
    }

    public function upload(Request $request) {

        if($request->hasFile('avatar')) {
            $allowedfileExtension=['jpg','png','jpeg'];
            $files = $request->file('avatar');
            $exe_flg = true;

            $extension = $files->getClientOriginalExtension();

            $check = in_array($extension, $allowedfileExtension);

            if(!$check) {
                $exe_flg = false;
            }

            if($exe_flg) {
                $imagepost = $request->file('avatar');

                $fileName = $files->getClientOriginalName();

                $input['imagename'] =  $fileName;

                $destinationPath = base_path(). '/../assets/images/upload';
                $path = 'assets/images/upload/' . $input['imagename'];
                $imagepost->move($destinationPath, $input['imagename']);
                return $path;
            } else {
                return false;
            }
        }

    }
}
