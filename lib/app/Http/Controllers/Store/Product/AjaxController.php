<?php

namespace App\Http\Controllers\Store\Product;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class AjaxController extends Controller
{
   //
   //Load product
   public function list()
   {
      $products = Product::query()
          ->get();
       return view('page.store.home.listProduct', [
           'products' => $products
       ]);
   }

    public function search(Request $request)
    {
        $products = Product::query()
            ->where(
                'product_name',
                'like',
                '%' . $request->keyword . '%' )
            ->orWhere(
                'product_sku',
                'like',
                '%' . $request->keyword .'%' )
            ->get();
        return view('page.store.home.listProduct', [
            'products' => $products
        ]);
    }
}
