<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Model\MUser;
use Illuminate\Http\Request;


class WebController extends Controller
{
     public function index()
    {

        $user = auth()->user();

        if (!$user) {
            return redirect()->route('account.page.login');
        }

        $account = MUser::query()
            ->with('wallets')
            ->where('username', '=', $user->username)
            ->first();

        return view('page.user.account.index', [
            'account' =>$account
        ]);
    }

    public function deposit()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('account.page.login');
        }

        $account = MUser::query()
            ->with('wallets')
            ->where('username', '=', $user->username)
            ->first();

        return view('page.user.account.deposit', [
            'account' =>$account
        ]);
    }

    public function withdraw()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('account.page.login');
        }

        $account = MUser::query()
            ->with('wallets')
            ->where('username', '=', $user->username)
            ->first();

        return view('page.user.account.withdraw', [
            'account' =>$account
        ]);
    }

    public function setting()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('account.page.login');
        }

        $account = MUser::query()
            ->with('wallets')
            ->where('username', '=', $user->username)
            ->first();

        return view('page.user.account.setting', [
            'account' =>$account
        ]);
    }
}
