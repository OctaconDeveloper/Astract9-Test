<!-- {{$featured}}  -->
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{$data->category->name.' >> '.$data->name}}</h2> 
						@forelse($data->products as $feature)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										@if($feature->image[0])
											<img src="{{url($feature->image[0]->file)}}" alt="{{$feature->slug}}" />
										@else
											<img src="" alt="{{$feature->slug}}" />
										@endif
										<h2>${{$feature->amount}}</h2>
										<p>{{$feature->name}}</p>
										<a href="#" class="btn btn-default add-to-cart">
											<i class="fa fa-shopping-cart"></i>Add to cart
										</a>
									</div> 
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>${{$feature->amount}}</h2>
											<p>{{$feature->name}}</p>
											<a href="/product/{{$feature->slug}}" class="btn btn-default add-to-cart">
												<i class="fa fa-eye"></i> Product details
											</a>
										</div>
										@if($feature->type=='sale')
											<img src="{{url('images/'.$feature->type.'.png')}}" class="new" alt="{{$feature->type}}" />
										@elseif($feature->new() == 'new')
										<img src="{{url('images/new.png')}}" class="new" alt="{{$feature->type}}" />
										@endif
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@empty
						<h4 class="title text-center">
							No record found for {{$data->category->name.' >> '.$data->name}}
						</h4>
						<br/><br/><br/>
						@endforelse
						
					</div><!--features_items-->