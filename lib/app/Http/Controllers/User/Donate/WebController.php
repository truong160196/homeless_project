<?php

namespace App\Http\Controllers\User\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
     public function list(Request $request)
    {
        $donates = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->where('donate_status', 'donate')
            ->paginate(6);

        return view('page.user.donate.list', ['donates' => $donates]);
    }

    public function detail($id)
    {
        $donate = DB::table('donates')
        ->where('id', $id)
        ->first();

        return view('page.user.donate.detail', ['donate' => $donate]);
    }

    public function donate($id)
    {
        $donate = DB::table('donates')
        ->where('id', $id)
        ->first();

        return view('page.user.donate.donate', ['donate' => $donate]);
    }
}
