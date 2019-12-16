<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;

class AuthenticateApi
{
    protected $except = [
        'api/utils/get'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if(!$this->inExceptArray($request)) {
                if (!empty($request->header('Authorization'))) {
                    if (strpos($request->header('Authorization'), '.') !== false) {
                        $token = explode('.', $request->header('Authorization'));
                        $user_id = json_decode(base64_decode($token[1]))->sub;
                    } else {
                        if (\Request::is('*/webview/*')) {
                            return redirect()->route('user.error.403');
                        }
                        return $this->JsonExport(405, trans('app.expire_session'));
                    }
                    $user = auth('api')->user();
                    if (empty($user)) {
                        if (\Request::is('*/webview/*')) {
                            return redirect()->route('user.error.403');
                        }
                        return $this->JsonExport(405, trans('app.expire_session'));
                    }
                    if (\Request::is('*/webview/*')) {
                        if(Carbon::parse($user->last_update_password)->diffInDays(Carbon::now()) > 90) {
                            return redirect()->route('user.error.403');
                        }
                    } else {
                        if(Carbon::parse($user->last_update_password)->diffInDays(Carbon::now()) > 90) {
                            return $this->JsonExport(499, trans('app.expire_password'));
                        }
                    }
                } else {
                    if(!empty($request->token)) {
                        $bearer = 'Bearer '.$request->token;
                        if (strpos($bearer, '.') !== false) {
                            $token = explode('.', $bearer);
                            $user_id = json_decode(base64_decode($token[1]))->sub;
                            session(['tokenapi' => $request->token]);
                            session(['user_id' => $user_id]);
                        } else {
                            if (\Request::is('*/webview/*')) {
                                return redirect()->route('user.error.403');
                            }
                            return $this->JsonExport(405, trans('app.expire_session'));
                        }
                        $user = auth('api')->user();
                        if (empty($user)) {
                            if (\Request::is('*/webview/*')) {
                                return redirect()->route('user.error.403');
                            }
                            return $this->JsonExport(405, trans('app.expire_session'));
                        }
                        if (\Request::is('*/webview/*')) {
                            if(Carbon::parse($user->last_update_password)->diffInDays(Carbon::now()) > 90) {
                                return redirect()->route('user.error.403');
                            }
                        } else {
                            if(Carbon::parse($user->last_update_password)->diffInDays(Carbon::now()) > 90) {
                                return $this->JsonExport(499, trans('app.expire_password'));
                            }
                        }
                    } else {
                        if (\Request::is('*/webview/*')) {
                            return redirect()->route('user.error.403');
                        }
                        return $this->JsonExport(405, trans('app.expire_session'));
                    }
                }
            }

            return $next($request);
        } catch (\Exception $e) {
            if (\Request::is('*/webview/*')) {
                return redirect()->route('user.error.403');
            }
            return $this->JsonExport(405, trans('app.expire_session'));
        }
    }

    static public function JsonExport($code, $msg)
    {
        $callback = [
            'code' => $code,
            'msg' => $msg
        ];
        return response()->json($callback, 200, [], JSON_NUMERIC_CHECK);
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }
            if ($request->fullUrlIs($except) || $request->is($except)) {
                return true;
            }
        }

        return false;
    }

}
