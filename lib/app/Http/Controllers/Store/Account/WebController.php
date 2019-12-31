<?php

namespace App\Http\Controllers\Store\Account;

use App\Http\Controllers\Controller;
use App\Model\MUser;
use Validator;

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

        return view('page.store.account.index', [
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

        return view('page.store.account.deposit', [
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

        return view('page.store.account.withdraw', [
            'account' =>$account
        ]);
    }

}
