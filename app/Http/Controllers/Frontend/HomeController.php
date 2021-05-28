<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Review;
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
    public function productReview($id)
    {
        //dd($id);

        
        $data['allData'] = Product::where('id', $id)->get();
       
        //dd($data['allData'] );
        return view('pages.review', $data);
     
       
     
       
    }
    public function productReviewStore(Request $request)
    {
        //dd($id);

        //  $reviews = DB::Table('reviews')->select('review')->where('product_id', 5)->get();
        //  dd($reviews );
        $data = new Review();
       
    
        $data->Product_id = $request->product_id;
        $review = $request->review;
        $data->review = $review*20;
        
        $data->save();
        return redirect()->route('mainpage');
        
        
       
     
       
    }
}
