<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
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

      
        
        $editData = Category::find($id);

        return view('backend.admin.category.edit', compact('editData'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',

            
        ]);
        
        $data = Category::find($id);
        $data->name = $request->name;
        

        $data->save();
        return redirect()->route('category.view')->with('success', 'Edit Category Successfully');
    }

    public function delete($id)
    {
        $class = Category::find($id);


        $class->delete();
        return redirect()->route('category.view')->with('success', 'Year Deleted Successfully');
    }
}
