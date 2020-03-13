
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $cat)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->name}}">
											@if($cat->brand)
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											@endif
											{{$cat->name}} <br/>
										</a>
									</h4>
								</div>
								<div id="{{$cat->name}}" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											@foreach($cat->brand as $brand)
												<li>
													<a href="{{ url('category/'.$cat->slug.'/'.$brand->slug)}}">
														{{$brand->name}} 
													</a>
												</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Vendors</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($vendors as $vendor)
									<li>
										<a href="{{url('vendor/'.$vendor->slug)}}"> 
											<span class="pull-right">
												({{$vendor->product_count}})
											</span>
											{{$vendor->name}}
										</a>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>