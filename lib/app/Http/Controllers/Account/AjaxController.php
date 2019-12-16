<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AjaxController extends Controller
{
    public function admin_login_ajax(Request $request)
    {
        $rules = array(
            'username' => 'required|min:3|max:16',
            'password' => 'required|min:6|max:32',
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->JsonExport(403, __('app.error_403'));
        } else {
            try {

                $credentials = [
                    'username' => $request->username,
                    'password' => $request->password,
                    'status' => 1
                ];

                if (Auth::attempt($credentials, true)) {
                    return $this->JsonExport(200, __('app.login_success'));
                } else {
                    return $this->JsonExport(403, __('app.wrong_password'));
                }

            } catch (\Exception $e) {
                return $this->JsonExport(500, __('app.error_500'));
            }
        }
    }

    public function admin_logout_ajax(Request $request)
    {
        try {
            if (Auth::user()) {
                Auth::logout();
            }
            session()->flush();
            return redirect()->route('admin.page.login');
        } catch (\Exception $e) {
            return redirect()->route('admin.page.login');
        }
    }
}
