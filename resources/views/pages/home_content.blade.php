@extends('layout')



@section('content')

<?php

use App\Model\Product;
use App\Model\Review;
use Illuminate\Support\Facades\DB;


?>

<div class="product-widgets row pt-1 m-b-2 mb-6">
	@foreach($categoryes as $key => $category)
	<?php
	$i = 0;
	$j = 0;
	$t = 0;

	$products = Product::where('category_id', $category->id)->get();

	?>

	<div class="col-md-4 col-sm-6 pb-5">
		@foreach($products as $key => $count)
		<?php
		$j = $j + 1;
		?>
		@endforeach
		@if($j>=3)
		<h4 class="section-sub-title text-uppercase m-b-3">{{ $category->name}}</h4>
		@endif

		@foreach($products as $key => $product)
		<?php
		$i = $i + 1;
		?>
		@endforeach


		@foreach($products as $key => $product)
		<?php
		$r = 0;
		$rsum = 0;
		$reviews = DB::Table('reviews')->select('review')->where('product_id', $product->id)->get();
		?>
		@if($i>=3)
		<div class="product-default left-details product-widget mb-2">
			<figure>
				<a href="product.html">
					<img src="{{(!empty($product->image))? url('upload/product_images/'.$product->image):url('upload/no_image.jpg') }}" width="168" height="168"" width=" 168" height="168">
				</a>
			</figure>
			<div class="product-details">
				<div class="category-list">
					<a href="category.html" class="product-category">{{ $product['category_class'] ['name']}}</a>
				</div>
				<h2 class="product-title">
					<a class="" href="{{ route('product.details',$product->id)}}">{{ $product->name}}</a>
				</h2>



				@foreach($reviews as $review)
				<?php
				$r = $r + 1;
				$rsum = $rsum + $review->review;

				?>
				<?php
				if ($r > 0) {
					$avg = $rsum / $r;
				}
				?>



				@endforeach

				<h1>{{$avg}}</h1>
				<div class="ratings-container">
					<div class="product-ratings">

						<a class="" href="{{ route('product.review',$product->id)}}">



							<span class="ratings" style="width:{{$avg}}%"></span><!-- End .ratings -->

						</a>
					</div><!-- End .product-ratings -->
				</div><!-- End .product-container -->



				<div class="price-box">
					<del class="old-price">$59.00</del>
					<span class="product-price">${{ $product->price}}</span>
				</div><!-- End .price-box -->
			</div><!-- End .product-details -->
		</div>
		@endif
		<?php
		$t = $t + 1;

		if ($t == 3) break;
		?>
		@endforeach





	</div>
	@endforeach
</div>



@endsection