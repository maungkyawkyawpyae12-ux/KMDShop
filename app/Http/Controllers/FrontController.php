<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class FrontController extends Controller
{
    public function shop()
   {
       $items=Item::OrderBy('id','desc')->paginate(8);
    //    var_dump($item);
       return view('front.shop',compact('items'));
   } 
    public function shopItem($id)
   {
         $item=Item::findorFail($id);
          return view('front.shop-item',compact('item'));
   }
    public function carts()
    {
            return view('front.carts');

    }
}
