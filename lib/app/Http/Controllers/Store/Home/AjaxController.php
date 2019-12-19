<?php

namespace App\Http\Controllers\Store\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use Validator;

class AjaxController extends Controller
{
   //
   //Load product
   public function list()
   {
      $products = DB::table('products')->get();
      // print_r($products);
      return $products;
   }
}
