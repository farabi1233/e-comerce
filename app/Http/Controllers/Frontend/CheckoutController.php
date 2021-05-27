<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\customer;
use App\Model\Shipping;
use App\User;
use Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function login_check(){
        return view('pages.login');

    }
    public function customer_reg(Request $request){
        
        $code = rand(0000,9999);
                
        $user = new User();
        
        $user->usertype = 'customer';
        $user->role = 'customer';
        $user->code =$code;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->mobile = $request->phone;
        $user->save();
        return redirect()->route('mainpage');
    }

    public function checkout(){
        dd('hello');
        

        //return view('pages.checkout');
}
public function save_shiping_details(Request $request)
    {

        $data = new Shipping();
       
    
        $data->user_id = $request->user_id;
        $data->user_name = $request->user_name;
        $data->email = $request->email;
        $data->address = $request->address;
       
        $data->mobile = $request->mobile;
        $data->save();

     $request->session()->put('shiping_id', $data->id);
       

       
        
        return redirect()->route('payment');
        
    }
public function payment()
    {

        return view('pages.payment');
        
    }
public function thanks()
    {

        return view('pages.thanks');
        
    }
public function order_place(Request $request)
    {
       
     
$contents = Cart::getContent();
  
$total = Cart::getTotal();  

$payment_method = $request->payment_method;
//);
$shiping_id = $request->session()->get('shiping_id');

$customer_id = Auth::user()->id;

$pdata= array();
$pdata['method']=$payment_method;
$pdata['user_id']=$customer_id;
$pdata['status']=0;

$payment_id = DB::table('payments')->insertGetId($pdata);

$odata= array();
$odata['user_id']=$customer_id;
$odata['shipping_id']=$shiping_id;
$odata['payment_id']=$payment_id;
$odata['order_total']=$total;
$odata['order_status']=0;
$order_id = DB::table('orders')->insertGetId($odata);


$oddata= array();

foreach($contents as $value ){
    
    $oddata['order_id']= $order_id;
    $oddata['payment_id']= $payment_id;
    $oddata['customer_id']= $customer_id;
    $oddata['shiping_id']= $shiping_id;
    $oddata['product_id']=$value->id;
    $oddata['product_name']=$value->name;
    $oddata['product_price']=$value->price;
    $oddata['product_seles_quantity']=$value->quantity;
    $oddata['status']=0;
    DB::table('order_details')->insert($oddata);
    Cart::remove($value->id);

}

return redirect()->route('thanks');
        
    }
}
