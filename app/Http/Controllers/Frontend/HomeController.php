<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function view()
    {

       // dd('done');
        //$data['products'] = Product::all();
        $data['categoryes'] = Category::all();
        
        return view('pages.home_content', $data);
     
       
    }
    public function productDetails($id)
    {

        $data['allData'] = Product::find($id);
        //dd($data['allData'] );
        return view('pages.details', $data);
       
     
       
    }
}
