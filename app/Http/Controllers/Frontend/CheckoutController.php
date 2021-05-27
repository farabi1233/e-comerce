<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\customer;
use App\Model\Shipping;
use App\User;
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
       
        $data->shipping_method = $request->shipping_method;
        $data->user_id = $request->user_id;
        $data->user_name = $request->user_name;
        $data->email = $request->email;
        $data->address = $request->address;
       
        $data->mobile = $request->mobile;
        dd($data->shipping_method );
       // $data->save();
        //return redirect()->route('payment');
        
    }
public function payment()
    {

        return view('pages.payment');
        
    }
public function order_place(Request $request)
    {

        return view('pages.payment');
        
    }
}
