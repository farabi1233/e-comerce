@extends('layout')

@section('content')
<?php
$contents = Cart::getContent();
$qtn = Cart::getTotalQuantity()
//	echo "<pre>";
//	print_r($contents);

?>

<div class="checkout-step-shipping">
    <h2 class="step-title">Shipping Methods</h2>
   
    <form action="{{ route('order_place')}}" method="POST">
                            @csrf
        <tr>
            <td><input type="radio" name="payment_method" value="COD" require></td>
            <td><strong>Cash On Delivary</strong></td>

        </tr>
        <div class="row justify-content-center">

<input type="submit" class="btn btn-primary" value="Done">
</div><!-- End .form-group --
</div>

>


</div><!-- End .form-group -->
</form>
 @endsection