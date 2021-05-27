<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view()
    {
        $data['allData'] = OrderDetails::all();
        return view('backend.admin.order.view', $data);
    }
    

   


    public function edit($id)
    {
        $data = OrderDetails::find($id);
        $data->status = 1;
      
        $data->save();
        return redirect()->route('order.view')->with('success', ' Successfully');

        
    }
   

    public function delete($id)
    {

        
        $order = OrderDetails::find($id);

        $order->delete();
        return redirect()->route('order.view')->with('success', 'Order Deleted Successfully');
    }
}
