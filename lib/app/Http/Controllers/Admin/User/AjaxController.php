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
            $data = MUser::query();
            return Datatables::of($data)->make(true);
        } catch (\Exception $e) {
            dd($e);
            throw new \App\Exceptions\ExceptionDatatable();
        }
    }

}
