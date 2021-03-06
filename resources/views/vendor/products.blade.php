 @extends('layout.vendor.app')
@section('title', 'Product List') 
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
      </div> 
      <div class="row">
      	<!-- {{$products}}  -->
      	<div class="col-sm-12">
      		
	      <table class="table table-striped table-hover">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Vendor</th>
		      <th scope="col">Brand</th>
		      <th scope="col">Name</th>
		      <th scope="col">Price</th>
		      <th scope="col">Availabilty</th>
		      <th scope="col">Description</th>
		      <th scope="col">Status</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead> 
		  <tbody> 
		  	@forelse($myproduct as $key => $product)
		    <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$product->vendor->name}}</td>
		      <td>{{$product->brand->name}}</td>
		      <td>{{$product->name}}</td>
		      <td>${{$product->amount}}</td>
		      <td>{{$product->availabilty==1? 'In Stock' : 'Out of Stock'}}</td>
		      <td>{{ucfirst($product->description)}}</td>
		      <td>{!! $product->status==1 ? '<b class="alert-success">Active</b>' : '<b class="alert-danger">Inactive</b>' !!}</td>
		      <td>
		      	<a href="/user/view_product/{{$product->id}}" class="btn btn-warning"><span data-feather="eye" data-toggle="tooltip" data-placement="top" title="Edit {{$product->name}}"></span></a>
		      </td>
		      <td>
		      	<a href="/user/delete_product/{{$product->id}}" class="btn btn-danger"><span data-feather="trash" data-toggle="tooltip" data-placement="top" title="Delete {{$product->name}}"></span></a>
		      </td>
		    </tr>
		    @empty
		    <tr>
		      <th colspan="6">No product Listed</th>
		  </tr>
		    @endforelse
		  </tbody>
		</table>
      	</div>
      </div>
  </main>
  @endsection