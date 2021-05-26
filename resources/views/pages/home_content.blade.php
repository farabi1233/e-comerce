@extends('layout')



@section('content')
<div class="product-widgets row pt-1 m-b-2 mb-6">

	@foreach($allData as $key => $product)
	<div class="col-md-4 col-sm-6 pb-5">
		<h4 class="section-sub-title text-uppercase m-b-3">{{ $product['category_class'] ['name']}}</h4>
		<div class="product-default left-details product-widget mb-2">
			<figure>
				<a href="product.html">
					<img src="{{(!empty($product->image))? url('upload/product_images/'.$product->image):url('upload/no_image.jpg') }}" width="168" height="168">
				</a>
			</figure>
			<div class="product-details">
				<div class="category-list">
					<a href="category.html" class="product-category">{{ $product['category_class'] ['name']}}</a>
				</div>
				<h2 class="product-title">
					<a class="" href="{{ route('product.details',$product->id)}}">{{ $product->name}}</a>
				</h2>
				<div class="ratings-container">
					<div class="product-ratings">
						<span class="ratings" style="width:70%"></span><!-- End .ratings -->
						<span class="tooltiptext tooltip-top"></span>
					</div><!-- End .product-ratings -->
				</div><!-- End .product-container -->
				<div class="price-box">

					<span class="product-price">${{ $product->price}}</span>
				</div><!-- End .price-box -->
			</div><!-- End .product-details -->
		</div>

	</div>
	@endforeach

</div><!-- End .product-widgets -->

@endsection