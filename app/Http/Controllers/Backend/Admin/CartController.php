<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class CartController extends Controller
{
    public function add(Request $request){
       
        $product = Product::find($request->product_id);
     // return $product->name;
        // $data = new Product();
        // $data->id = $request->product_id;
         $qty = $request->qty;

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $qty,
            
            'attributes' => [

              'image' => $product->image,
            ]
            
        ]);
        return redirect()->route('show_cart');
      

       // return view('pages.add_to_card');
}
public function show_cart(){
  return view('pages.show_card');

}
public function item_remove($id){

 // dd($id);
  Cart::remove($id);
  return redirect()->back();

}

}

