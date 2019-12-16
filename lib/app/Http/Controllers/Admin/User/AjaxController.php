<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\MUser;
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

}
