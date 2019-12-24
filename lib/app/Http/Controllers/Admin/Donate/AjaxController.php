<?php

namespace App\Http\Controllers\Admin\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Validator;

class AjaxController extends Controller
{
    public function create(Request $request)
    {
        $rules = array(
            'donate_title' => 'required',
            'address' => 'required',
            'privateKey' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->JsonExport(403, __('app.error_403'));
        } else {
            try {
                DB::beginTransaction();
                $path = $this->upload($request);
                if (!$path) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not create fund');
                }

                $start_date = Carbon::createFromFormat('d-m-Y H:i:s', $request->start_date);
                $end_date = Carbon::createFromFormat('d-m-Y H:i:s', $request->end_date);

                $donates = [
                    'donate_title' => $request->donate_title,
                    'donate_detail' => $request->donate_detail,
                    'donate_start_time' => $start_date,
                    'donate_end_time' => $end_date,
                    'donate_image' => $path,
                    'donate_goal' => $request->goal,
                    'donate_address' => $request->address,
                    'donate_private_key' => $request->privateKey,
                    'donate_public_key' => $request->publicKey,
                    'category_id' => 1
                ];

                $id = DB::table('donates')->insertGetId($donates);

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
