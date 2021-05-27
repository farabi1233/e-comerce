@extends('layout')

@section('content')
<?php
$contents = Cart::getContent();
$qtn = Cart::getTotalQuantity()
//	echo "<pre>";
//	print_r($contents);

?>

payment


@endsection