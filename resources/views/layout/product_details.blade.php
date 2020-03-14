
			
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product"> 
								@if($product->image->isEmpty())
									<img src="" alt="{{$product->slug}}" />
								@else
									<img src="{{url($product->image[0]->file)}}" alt="{{$product->slug}}" />
								@endif
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
											@forelse($product->image as $image)
											  <a href="">
											  	<img style="height: 50px;" src="{{url($image->file)}}" alt="{{$product->slug}}"></a>
										  	@empty
										  	@endforelse
										</div>
										<div class="item">
										  @forelse($product->image as $image)
											  <img style="height: 50px;" src="{{url($image->file)}}" alt="{{$product->slug}}"></a>
										  	@empty
										  	@endforelse
										</div>
										<div class="item">
										  @forelse($product->image as $image)
											  <img style="height: 50px;" src="{{url($image->file)}}" alt="{{$product->slug}}"></a>
										  	@empty
										  	@endforelse
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div> 
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$product->name}}</h2>
								<p>Web ID: #{{$product->id.$product->status.$product->vendor->id.$product->brand->id}}</p>
								<img src="{{url('images/product-details/rating.png') }}" alt="{{$product->slug}}" />
								<span>
									<span>US ${{$product->amount}}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b>@if($product->availability > 0) In Stock @else Out of Stock @endif</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> {{$product->brand->name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					