<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\customer;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
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
        return redirect()->route('home');
    }

    public function checkout(){
        
        return view('pages.checkout');
}
}