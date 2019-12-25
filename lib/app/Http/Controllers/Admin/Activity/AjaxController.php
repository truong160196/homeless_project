<?php

namespace App\Http\Controllers\Admin\Activity;

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
       $activity= DB::table('donate_activities')->where('is_delete', 0)->get();
       return view('page.admin.setting.donate_activity.listActivity', [
           'activities' => $activity
       ]);
   }

   public function delete(Request $request) {
       try {
           DB::beginTransaction();

           DB::table('donate_activities')
           ->where("donate_activities.id", '=',  $request->id)
           ->update(['donate_activities.is_delete'=> '1','donate_activities.deleted_at'=>Carbon::today()->toDateString()]);
           
           DB::commit();
           return $this->JsonExport(200, 'Delete activity successfully');

       } catch (\Exception $e) {
           return $this->JsonExport(500, 'Internal Server Error');
       }
   }
   public function update(Request $request) {
    $rules = array(
        'activity_name_edit' => 'required',
        'id_edit' => 'required'
    );

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return $this->JsonExport(403, __('app.error_403')); 
    } else {
        try {
            DB::beginTransaction();
            DB::table('donate_activities')
            ->where("donate_activities.id", '=',  $request->id)
            ->update(['donate_activities.activity_name'=> $request->activity_name_edit,'donate_activities.activity_detail'=> $request->activity_detail_edit,'donate_activities.updated_at'=>Carbon::today()->toDateString()]);
            
            DB::commit();
            return $this->JsonExport(200, 'Update Activity successfully');

        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
   public function create(Request $request)
   {
       $rules = array(
           'activity_name' => 'required'
       );

       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
           return $this->JsonExport(403, __('app.error_403')); 
       } else {
           try {
               DB::beginTransaction();
               $activity = [
                   'activity_name' => $request->activity_name,
                   'activity_detail' => $request->activity_detail,
                   'created_at'=> Carbon::today()->toDateString()
               ];
               $id = DB::table('donate_activities')->insertGetId($activity);

               if (!$id) {
                   DB::rollback();
                   return $this->JsonExport(404, 'Can not create activity');
               }
               
               DB::commit();
               return $this->JsonExport(200, 'Create activity successfully');
           }catch (\Exception $e) {
               return $this->JsonExport(500, 'Internal Server Error');
           }
       }
   }
   public function detail($id)
   {
       try {
           $activity= DB::table('donate_activities')->where('id','=', $id)->first();
           if ($activity) {
               return response()->json(['data' => $activity], 200);
           }

       } catch (\Exception $e) {
           return response()
               ->json(['msg' => 'Can not find activity'], 500);
       }
   }
}
