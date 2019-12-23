<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\MUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;

class AjaxController extends Controller
{

    public function list()
    {
        $categories = DB::table('donate_categories')->where('is_delete', 0)->get();
        return view('page.admin.setting.donate_category.listCategory', [
            'categories' => $categories
        ]);
    }

    public function delete(Request $request) {
        try {
            DB::beginTransaction();

            DB::table('donate_categories')
            ->where("donate_categories.id", '=',  $request->id)
            ->update(['donate_categories.is_delete'=> '1','donate_categories.deleted_at'=>Carbon::today()->toDateString()]);
            
            DB::commit();
            return $this->JsonExport(200, 'Update Category successfully');

        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }

    public function create(Request $request)
    {
        $rules = array(
            'category_name' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->JsonExport(403, __('app.error_403')); 
        } else {
            try {
                DB::beginTransaction();
                $category = [
                    'category_name' => $request->category_name,
                    'category_detail' => $request->category_detail,
                    'created_at'=> Carbon::today()->toDateString()
                ];
                $id = DB::table('donate_categories')->insertGetId($category);

                if (!$id) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not create category');
                }
                
                DB::commit();
                return $this->JsonExport(200, 'Create category successfully');
            }catch (\Exception $e) {
                return $this->JsonExport(500, 'Internal Server Error');
            }
        }
    }
}
