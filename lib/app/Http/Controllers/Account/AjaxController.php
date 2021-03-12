<?php

namespace App\Http\Controllers\Account;

use App\Model\MUser;
use App\Model\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
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
                ];

                if (Auth::attempt($credentials, true)) {
                    return $this->JsonExport(200,'Login successfully');
                } else {
                    return $this->JsonExport(403, 'Wrong password');
                }

            } catch (\Exception $e) {
                return $this->JsonExport(500, 'Internal Server Error');
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
            return redirect()->route('account.page.login');
        } catch (\Exception $e) {
            return redirect()->route('account.page.login');
        }
    }

    public function admin_register_ajax(Request $request)
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

                $role = Role::query()
                    ->where('name', '=', 'User')
                    ->first();

                if (!$role) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not register account');
                }

                $account = [
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'role_id' => $role->id
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
                    'user_id' => $id
                ];

                $result = DB::table('wallets')->insert($wallet);

                if (!$result) {
                    DB::rollback();
                    return $this->JsonExport(404, 'Can not register account');
                }

                DB::commit();

                $credentials = [
                    'username' => $request->username,
                    'password' => $request->password,
                    'status' => 1
                ];

                if (!Auth::attempt($credentials, true)) {
                    return $this->JsonExport(403, 'Can not register account');
                }

                return $this->JsonExport(200, 'Login success');

            } catch (\Exception $e) {
                return $this->JsonExport(500, 'Internal Server Error');
            }
        }
    }

    public function admin_account_ajax(Request $request)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return response()->json(['msg' => 'Can not found user!!'], 404, []);
            }

            $account = MUser::query()
                ->where('username', '=', $user->username)
                ->first();

            if (!$account) {
                return response()->json(['msg' => 'Can not found user!!'], 404, []);
            }

            $wallet = Wallet::query()
                ->where('user_id', '=', $account->id)
                ->first();

            return response()->json([
                'user' => $account,
                'wallet' => $wallet
            ], 200, []);

        } catch (\Exception $e) {
            return $this->JsonExport(500, 'Internal Server Error');
        }
    }
}
