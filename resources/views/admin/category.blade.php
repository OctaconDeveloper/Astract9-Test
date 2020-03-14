 @extends('layout.admin.app')
@section('title', 'Vendor List') 
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
      </div>
      <div class="row">
      	<!-- {{$category}} -->
      	<div class="col-sm-5">
      		<form action="{{ route('newcategory') }}" method="post">
      			@include('layout.errrors')
      			@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Category Name</label>
			    <input type="text" class="form-control" name="name" placeholder="Category Name">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Brand</label>
			    <textarea rows="9" style="resize: none;" class="form-control" name="brand_details" placeholder="Enter Brand seperated by comma (,)"></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary">Add</button>
	      	</form>
      	</div>
      	<div class="col-sm-7">
      		
      <table class="table table-striped table-hover">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col" style="width: 150px">Category Name</th>
	      <th scope="col" style="width: 500px">Brands</th>
	      <th scope="col" style="width: 10px"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@forelse($category as $key => $cat)
	    <tr>
	      <th scope="row">{{$key+1}}</th>
	      <td>{{$cat->name}}</td>
	      <td>
	      	<ul style="text-decoration: none; list-style: none; width: 100%">
	      		@forelse($cat->brand as $brand)
	      		<li style="text-decoration: none;" >{{$brand->name}} - <a href="/delete_brand/{{$brand->id}}" style="color: red">remove</a></li>
	      		@empty
	      		@endforelse
	      	</ul>
	      </td>
	      <td>
	      	<a href="/delete_category/{{$cat->id}}" class="btn btn-danger"><span data-feather="trash" data-toggle="tooltip" data-placement="top" title="Delete {{$cat->name}}"></span></a>
	      </td>
	    </tr>
	    @empty
	    <tr>
	      <th colspan="6">No Category Listed</th>
	  </tr>
	    @endforelse
	  </tbody>
	</table>
      	</div>
      </div>
  </main>
  @endsection