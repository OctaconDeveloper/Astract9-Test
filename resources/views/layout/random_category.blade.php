<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			@forelse($randomBrand as $key => $brand)
			@if($key===0)
				<li class="active">
			@else
				<li>
			@endif
				<a href="#{{$brand->slug}}" data-toggle="tab">{{$brand->name}}</a>
			</li>
			@empty

			@endforelse 
		</ul>
	</div>
	<div class="tab-content">
		@forelse($randomBrand as $key => $brand)
		<div class="tab-pane fade active in" id="{{$brand->slug}}" >
		@forelse($brand->products as $key => $product)
			<div class="col-sm-3">
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
			@empty

			@endforelse
		</div>
		@empty

		@endforelse
	</div>
</div><!--/category-tab-->
