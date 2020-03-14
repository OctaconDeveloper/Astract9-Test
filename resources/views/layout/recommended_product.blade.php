<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center">recommended items</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
			@foreach($randomProducts1 as $product)	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
							@if($product->image->isEmpty())
								<img src="" alt="{{$product->slug}}" />
							@else
								<img src="{{url($product->image[0]->file)}}" alt="{{$product->slug}}" />
							@endif
								<h2>${{$product->amount}}</h2>
								<p>{{$product->name}}</p>
								<a href="/product/{{$product->slug}}" class="btn btn-default add-to-cart">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</a>
							</div>
							@if($product->type=='sale')
								<img src="{{url('images/'.$product->type.'.png')}}" class="new" alt="{{$product->type}}" />
							@elseif($product->new() == 'new')
								<img src="{{url('images/new.png')}}" class="new" alt="{{$product->type}}" />
							@endif
							
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="item">	
			@foreach($randomProducts2 as $product)	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								@if($product->image->isEmpty())
									<img src="" alt="{{$product->slug}}" />
								@else
									<img src="{{url($product->image[0]->file)}}" alt="{{$product->slug}}" />
								@endif
								<h2>${{$product->amount}}</h2>
								<p>{{$product->name}}</p>
								<a href="/product/{{$product->slug}}" class="btn btn-default add-to-cart">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</a>
							</div>
							@if($product->type=='sale')
								<img src="{{url('images/'.$product->type.'.png')}}" class="new" alt="{{$product->type}}" />
							@elseif($product->new() == 'new')
								<img src="{{url('images/new.png')}}" class="new" alt="{{$product->type}}" />
							@endif
							
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
	</div><!--/recommended_items-->