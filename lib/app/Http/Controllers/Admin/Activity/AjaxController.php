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
       try {
           DB::beginTransaction();
           DB::table('donate_activities')
           ->where("donate_activities.id", '=',  $request->id)
           ->update(['donate_activities.category_name'=> $request->name,'donate_categories.donate_activities'=> $request->detail,'donate_categories.updated_at'=>Carbon::today()->toDateString()]);
           
           DB::commit();
           return $this->JsonExport(200, 'Update Category successfully');

       } catch (\Exception $e) {
           return $this->JsonExport(500, 'Internal Server Error');
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
}
