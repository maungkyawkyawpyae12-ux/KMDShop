<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class FrontController extends Controller
{
    public function shop()
   {
       $item=Item::all();
    //    var_dump($item);
       return view('front.shop',compact('item'));
   } 
    public function shopItem($id)
   {
         $item=Item::findorFail($id);
         return view('front.shop-item',compact('item'));
   }
}
