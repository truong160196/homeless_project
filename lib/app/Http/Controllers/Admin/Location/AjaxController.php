<?php

namespace App\Http\Controllers\Admin\Location;

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
       $locations = DB::table('locations')->where('is_delete', 0)->get();
       return view('page.admin.setting.location.listLocation', [
           'locations' => $locations
       ]);
   }

   public function delete(Request $request) {
       try {
           DB::beginTransaction();
           DB::table('locations')
           ->where("locations.id", '=',  $request->id)
           ->update(['locations.is_delete'=> '1','locations.deleted_at'=>Carbon::today()->toDateString()]);
           
           DB::commit();
           return $this->JsonExport(200, 'Delete Locatinon successfully');

       } catch (\Exception $e) {
           return $this->JsonExport(500, 'Internal Server Error');
       }
   }
   public function update(Request $request) {
    $rules = array(
        'location_name_edit' => 'required',
        'id_edit_location' => 'required'
    );

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        return $this->JsonExport(403, __('app.error_403')); 
    } else {
        try {
            DB::beginTransaction();
            DB::table('locations')
            ->where("locations.id", '=',  $request->id_edit_location)
            ->update(['locations.location_name'=> $request->location_name_edit,'locations.updated_at'=>Carbon::today()->toDateString()]);
            
            DB::commit();
            return $this->JsonExport(200, 'Update Location successfully');

        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
    }
   public function create(Request $request)
   {
       $rules = array(
           'location_name' => 'required'
       );

       $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
           return $this->JsonExport(403, __('app.error_403')); 
       } else {
           try {
               DB::beginTransaction();
               $location = [
                   'location_name' => $request->location_name,
                   'created_at'=> Carbon::today()->toDateString()
               ];
               $id = DB::table('locations')->insertGetId($location);

               if (!$id) {
                   DB::rollback();
                   return $this->JsonExport(404, 'Can not create location');
               }
               
               DB::commit();
               return $this->JsonExport(200, 'Create location successfully');
           }catch (\Exception $e) {
               return $this->JsonExport(500, 'Internal Server Error');
           }
       }
   }
   public function detail($id)
   {
       try {
           $location = DB::table('locations')->where('id','=', $id)->first();
           if ($location) {
               return response()->json(['data' => $location], 200);
           }

       } catch (\Exception $e) {
           return response()
               ->json(['msg' => 'Can not find category'], 500);
       }
   }
}
