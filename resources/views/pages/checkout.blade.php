@extends('layout')

@section('content')
<?php

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

$contents = Cart::getContent();
$qtn = Cart::getTotalQuantity();
//	echo "<pre>";
//	print_r($contents);




?>



<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </nav>

    <div class="container mb-6">
        <ul class="checkout-progress-bar">
            <li class="active">
                <span>Shipping</span>
            </li>

        </ul>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Shipping Details</h2>



                        <form action="{{ route('save_shiping_details')}}" method="POST">
                            @csrf
                            <div class="form-group required-field">
                                <input name="user_id" value="{{Auth::user()->id}}" type="hidden" class="form-control" required>
                                <label>Name </label>
                                <input name="user_name" value="{{Auth::user()->name}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Phone </label>
                                <input name="mobile" value="{{Auth::user()->mobile}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Email </label>
                                <input name="email" value="{{Auth::user()->email}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Address </label>
                                <input name="address" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <table class="table table-step-shipping">
                        



                        </tbody>
                    </table>

                            <div class="row justify-content-center">

                                <input type="submit" class="btn btn-primary" value="Done">
                            </div><!-- End .form-group -->


            </div><!-- End .form-group -->
            </form>
            </li>

            
            </ul>
        </div><!-- End .col-lg-8 -->

        <div class="col-lg-4">
            <div class="order-summary">
                <h3>Summary</h3>

                <h4>
                    <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{$qtn}} products in Cart</a>
                </h4>

                <div class="collapse" id="order-cart-section">
                    <table class="table table-mini-cart">
                        <tbody>

                            @foreach($contents as $key => $value)
                            <?php
                            $image = $value->attributes->image;
                            //dd($image);
                            $total = ($value->price) * ($value->quantity);


                            ?>

                            <tr>
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{(!empty($image))? url('upload/product_images/'.$image):url('upload/no_image.jpg') }}" alt="product">
                                        </a>
                                    </figure>
                                    <div>
                                        <h2 class="product-title">
                                            <a href="product.html">{{$value->name}}</a>
                                        </h2>

                                        <span class="product-qty">Qty: {{$value->quantity}}</span>
                                    </div>
                                </td>
                                <td class="price-col">${{$total}}</td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>
                </div><!-- End #order-cart-section -->
            </div><!-- End .order-summary -->
        </div><!-- End .col-lg-4 -->
    </div><!-- End .row -->


    </div><!-- End .container -->
</main><!-- End .main -->

@endsection