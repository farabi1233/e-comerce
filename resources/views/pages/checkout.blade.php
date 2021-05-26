@extends('layout')

@section('content')
<?php
$contents = Cart::getContent();
$qtn = Cart::getTotalQuantity()
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
                        <h2 class="step-title">Shipping Address</h2>



                        <form action="#">
                            <div class="form-group required-field">
                                <input name="name" value="{{Auth::user()->id}}" type="hidden" class="form-control" required>
                                <label>Name </label>
                                <input name="name" value="{{Auth::user()->name}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Phone </label>
                                <input phone="mobile" value="{{Auth::user()->mobile}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Email </label>
                                <input phone="email" value="{{Auth::user()->email}}" type="text" class="form-control" required>
                            </div><!-- End .form-group -->
                            <div class="form-group required-field">
                                <label>Address </label>
                                <input phone="address" type="text" class="form-control" required>
                            </div><!-- End .form-group -->





            </div><!-- End .form-group -->
            </form>
            </li>

            <li>
                <div class="checkout-step-shipping">
                    <h2 class="step-title">Shipping Methods</h2>

                    <table class="table table-step-shipping">
                        <tbody>
                        
                            <tr>
                                <td><input type="radio" name="shipping-method" value="flat"></td>
                                <td><strong>Cash On Delivary</strong></td>
                                
                            </tr>
                           

                            
                        </tbody>
                    </table>
                </div><!-- End .checkout-step-shipping -->
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
							$total = ($value->price)*($value->quantity);
								
								
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

    <div class="row">
        <div class="col-lg-8">
            <div class="checkout-steps-action">
                <a href="checkout-review.html" class="btn btn-primary float-right">NEXT</a>
            </div><!-- End .checkout-steps-action -->
        </div><!-- End .col-lg-8 -->
    </div><!-- End .row -->
    </div><!-- End .container -->
</main><!-- End .main -->

@endsection