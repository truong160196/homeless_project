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
            return view('page.user.account.index', [
                'account' =>[]
            ]);
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
        return view('page.user.account.deposit');
    }

    public function withdraw()
    {
        return view('page.user.account.withdraw');
    }

    public function setting()
    {
        return view('page.user.account.setting');
    }
}
