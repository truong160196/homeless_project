<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\MUser;
use App\Model\RedInvoice;
use App\Model\Store;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AjaxController extends Controller
{
    public function list()
    {
        try {
            $data = MUser::query()->with('role');
            return Datatables::of($data)
                ->editColumn('role', function ($v) {
                    if (!empty($v->role)) {
                        return $v->role->name;
                    } else {
                        return '';
                    }
                })

                ->addColumn('action', function ($v) {
                    $action = '';
                    $action .= '<span data-toggle="tooltip" data-placement="top" title="View detail caterer" class="btn-action table-action-view cursor-pointer tx-info" data-id="' . $v->id . '"><i class="far fa-edit"></i></span>';
                    $action .= '<span data-toggle="tooltip" data-placement="top" title="Remove caterer" class="btn-action table-action-delete cursor-pointer tx-danger mg-l-5 " data-id="' . $v->id . '"><i class="fa fa-trash"></i></span>';

                    return $action;
                })
                ->rawColumns(['roles'])
                ->make(true);
        } catch (\Exception $e) {
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

    public function detail($id)
    {
        try {
            $data = Store::query()->with('redInvoices')
                ->first();

            return response()
                ->json(['data' => $data]);
        } catch (\Exception $e) {
            $dataExample = [
                "id" =>  1,
                "name" => "K.O.I The.",
              "address" =>  "521 Hồ Tùng Mậu, D1, HCM",
                        "district" =>  "Ward 1",
              "city" =>  "HCM",
              "phone" =>  "3388869944",
              "logoUrl" =>  "",
              "red_invoice_id" =>  1,
              "redInvoices" =>  [
                        "id" =>  1,
                "name" =>  "K.O.I The International Company",
                "address" =>  "9682 Wakehurst Avenue Arlington Heights, IL, 60004",
                "district" =>  "Heights",
                "city" =>  "IL",
                "taxCode" =>  "P77744944",
              ]
            ];

            return response()
                ->json(['data' => $dataExample]);
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = Store::find($request->idStore);

            if(!$data) {
                DB::rollback();
                return $this->JsonExport(500, 'User not exits');
            }

            $data->name = $request->nameStore;
            $data->address = $request->addressStore;
            $data->district = $request-> districtStore;
            $data->city = $request->cityStore;
            $data->phone = $request->phoneStore;
            $data->logoUrl = $request->imageAvatar;

            $data->save();


            $dataRedInvoice = RedInvoice::find($request->idStore);

            if(!$dataRedInvoice) {
                DB::rollback();
                return $this->JsonExport(500, 'Red invoice not exits');
            }

            $dataRedInvoice->name = $request->nameRedInvoice;
            $dataRedInvoice->address = $request->addressRedInvoice;
            $dataRedInvoice->district = $request-> districtRedInvoice;
            $dataRedInvoice->city = $request->cityRedInvoice;
            $dataRedInvoice->taxCode = $request->taxCodeRedInvoice;

            $dataRedInvoice->save();


            DB::commit();

            return $this->JsonExport(200, "Update successfully");
        } catch (\Exception $e) {
            dd($e);
            return $this->JsonExport(500, "can't not update this user");
        }
    }

    public  function upload(Request $request) {

        if($request->hasFile('file')) {
            $allowedfileExtension=['jpg','png','jpeg'];
            $files = $request->file('file');
            $exe_flg = true;

            $extension = $files->getClientOriginalExtension();

            $check = in_array($extension, $allowedfileExtension);

            if(!$check) {
                $exe_flg = false;
            }

            if($exe_flg) {
                $imagepost = $request->file('file');

                $fileName = $files->getClientOriginalName();

                $input['imagename'] =  $fileName;

                $destinationPath = base_path(). '/../assets/images/upload';
                $path = url('assets/images/upload/' . $input['imagename']);
                $imagepost->move($destinationPath, $input['imagename']);
                return response()
                    ->json(['path' => $path]);
            } else {
                return response()
                    ->json(['message' => "Hình đại diện không hợp lệ"]);
            }
        }

    }
}
