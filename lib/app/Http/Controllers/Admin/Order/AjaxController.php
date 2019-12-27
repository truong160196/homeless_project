<?php

namespace App\Http\Controllers\Admin\Order;


use App\Http\Controllers\Controller;
use App\Model\MUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AjaxController extends Controller
{
   public function list()
   {
    try {
        // cho này sao láy bản Muser
        $orders = DB::table('orders')->get();
        // return view('page.admin.order', [
        //     'orders' => $orders
        // ]);
        return Datatables::of($orders)
        ->addColumn('action', function ($v) {
            $action = '';
            $action .= '<span data-toggle="tooltip" data-placement="top" title="View detail caterer" class="btn-action table-action-view cursor-pointer tx-info btn-view-order" data-id="' . $v->id . '"><i class="far fa-eye"></i></span>';

            return $action;
        })->make(true);
    } catch (\Exception $e) {
        throw new \App\Exceptions\ExceptionDatatable();
    }
   }

   public function detail($id)
   {
       try {
        $orders = DB::table('orders')
                ->join('join_orders_products', 'orders.id', '=', 'join_orders_products.order_id')
                 ->join('products', 'products.id', '=', 'join_orders_products.product_id')
               ->where('join_orders_products.order_id','=', $id)
               ->get();

           return response()
               ->json(['data' => $orders]);
       } catch (\Exception $e) {
           return response()
               ->json(['msg' => 'Can find account'], 500);
       }
   }


   public function create(Request $request)
   {
       $rules = array(
           'username' => 'required|min:3|max:16',
           'password' => 'required|min:6|max:32',
           'address' => 'required',
           'privateKey' => 'required',
       );

       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
           return $this->JsonExport(403, __('app.error_403'));
       } else {
           try {
               DB::beginTransaction();

               $account = [
                   'username' => $request->username,
                   'password' => Hash::make($request->password),
                   'full_name' => $request->full_name,
                   'phone' => $request->phone,
                   'birthday' => $request->birthday,
                   'email' => $request->email,
                   'user_type' => $request->user_type,
                   'address' => $request->address_user,
                   'status' => $request->status,
                   'role_id' => $request->role_id
               ];

               $id = DB::table('users')->insertGetId($account);

               if (!$id) {
                   DB::rollback();
                   return $this->JsonExport(404, 'Can not register account');
               }

               $wallet = [
                   'address' => $request->address,
                   'pk' => $request->privateKey,
                   'public_key' => $request->publicKey,
                   'token' => $request->token,
                   'type' => $request->type,
                   'user_id' => $id
               ];

               $result = DB::table('wallets')->insert($wallet);

               if (!$result) {
                   DB::rollback();
                   return $this->JsonExport(404, 'Can not register account');
               }

               DB::commit();
               return $this->JsonExport(200, 'Create user successfully');

           } catch (\Exception $e) {
               return $this->JsonExport(500, 'Internal Server Error');
           }
       }
   }

   public function update(Request $request)
   {

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
