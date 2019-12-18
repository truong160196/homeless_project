<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\Store;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

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
            return response()
                ->json(['message' => "can't not get data user"]);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = Store::query()->with('redInvoices')
                ->first();

            return response()
                ->json(['data' => $data]);
        } catch (\Exception $e) {
            return response()
                ->json(['message' => "can't not get data user"]);
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
