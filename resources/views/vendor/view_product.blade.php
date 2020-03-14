  @extends('layout.vendor.app')
@section('title', $product->name) 
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Product</h1>
      </div>
      <div class="row">
      	<div class="col-sm-10">
      		<h5>View Product</h5>
      		<div class="row">
			  <div class="form-group col-md-6">
			    <label for="exampleInputEmail1">Category</label>
			    <input type="text" class="form-control" readonly="readonly" value="{{ucfirst($product->brand->category->name)}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Brand</label>
			    <input type="text" class="form-control" readonly="readonly" value="{{ucfirst($product->brand->name)}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Name</label>
			    <input type="text" class="form-control" readonly="readonly" value="{{$product->name}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Amount <small>(in dollars)</small></label>
			    <input type="text"  readonly="readonly" class="form-control" value="${{$product->amount}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Availabilty</label>
			    <input type="text" class="form-control" readonly="readonly" value="{{$product->availabilty==1? 'Available' : 'Out of Stock'}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Type</label>
			    <input type="text" class="form-control" readonly="readonly" value="{{ucfirst($product->type)}}">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Description</label>
			    <textarea class="form-control" readonly="readonly" name="description" rows="4" style="resize: none;" placeholder="Description">{{$product->description}}</textarea>
			  </div>
			  <div class="form-group col-md-6">
			  	 <div class="row" style="height: 120px; margin-top: 5px;">
			  	 	@forelse($product->image as $img)
				  	 	<img src="{{ asset('productImages/'.$img->file) }}" alt="{{$img->file}}" style="width: 70px; height: 70px; margin:5px">
			  	 	@empty
			  	 	@endforelse
			  	 </div>
			  </div>
	</div>
</div>
</main>
<style type="text/css">
	#formdiv {
  text-align: center;
}
#file {
  color: green;
  padding: 5px;
  border: 1px dashed #123456;
  background-color: #f9ffe5;
}
#img {
  width: 17px;
  border: none;
  height: 17px;
  margin-left: -20px;
  margin-bottom: 191px;
}
.upload {
  width: 100%;
  height: 30px;
}
.previewBox {
  text-align: center;
  position: relative;
  width: 150px;
  height: 150px;
  margin-right: 10px;
  margin-bottom: 20px;
  float: left;
}
.previewBox img {
  height: 150px;
  width: 150px;
  padding: 5px;
  border: 1px solid rgb(232, 222, 189);
}
.delete {
  color: red;
  font-weight: bold;
  position: absolute;
  top: 0;
  cursor: pointer;
  width: 20px;
  height:  20px;
  border-radius: 50%;
  background: #ccc;
}
</style>
@endsection