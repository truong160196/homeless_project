<?php

namespace App\Http\Controllers\User\Donate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AjaxController extends Controller
{
   //
   public function top_donate(Request $request)
    {  
         $donates = DB::table('donates')
            ->orderBy('donate_end_time', 'desc')
            ->limit(2)
            ->get();
    
        return \Response::json($donates);
    }
}
