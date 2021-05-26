<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view()
    {
        $data['allData'] = Product::all();
        return view('backend.admin.product.view', $data);
    }
    public function add()
    {
        
        $data['categories'] = Category::all();
        return view('backend.admin.product.add', $data);
    }

    public function store(Request $request)
    {

      
        $product = new Product();
               
               
                
                $product->category_id = $request->category_id;
                $product->manufacture_id = $request->manufacture_id;
                $product->name = $request->name;
                $product->details = $request->details;
                $product->size = $request->size;
                $product->colour = $request->colour;
                $product->status = $request->status;
                $product->price = $request->price;
               
                if ($request->file('image')) {
                    $file = $request->file('image');

                    $filename   = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('upload/product_images'), $filename);
                    $product['image'] = $filename;
                }

                
                $product->save();
                return redirect()->route('product.view')->with('success', 'Product Added Successfully');
    }



    public function edit($id)
    {

        $data['categories'] = Category::all();
        $data['editData'] = Product::find($id);
        
       

        return view('backend.admin.product.edit', $data);
    }
    public function update(Request $request,$id)
    {
        $data = Product::find($id);
        $data->category_id = $request->category_id;
        $data->manufacture_id = $request->manufacture_id;
        $data->name = $request->name;
        $data->details = $request->details;
        $data->size = $request->size;
        $data->colour = $request->colour;
        $data->status = $request->status;
        $data->price = $request->price;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/product_images/' . $data->image));
            $filename   = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/product_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('product.view')->with('success', 'Edit Product Successfully');

    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (file_exists('upload/product_images/' . $product->image)  &&! empty($product->image)) {
            unlink('upload/product_images/' . $product->image);
        }

        $product->delete();
        return redirect()->route('product.view')->with('success', 'Product Deleted Successfully');
    }


    public function details($id)
    {
        $data['allData'] = Product::find($id);
        //dd($data['allData'] );
        return view('pages.details', $data);
    }
}
