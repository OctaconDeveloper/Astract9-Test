 @extends('layout.vendor.app')
@section('title', 'Add Product') 
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Product</h1>
      </div>
      <div class="row">
      	<!-- {{$category}} -->
      	<div class="col-sm-10">
      		<h5>Add Product</h5>
      		<form action="{{ route('newproduct') }}" method="post" enctype="multipart/form-data">
      			@include('layout.errrors')
      			@csrf
      			<div class="row">
			  <div class="form-group col-md-6">
			    <label for="exampleInputEmail1">Category</label>
			    <select id="category" name="category" class="form-control">
			    	<option></option>
			    	@forelse($category as $key => $cat)
			    	<option value="{{$key}}">{{$cat->name}}</option>
			    	@empty
			    	@endforelse
			    </select>
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Brand</label>
			    <select id="brand" class="form-control" name="brand">
			    </select>
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Name</label>
			    <input type="text" class="form-control" name="name" placeholder="Product Name">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Amount <small>(in dollars)</small></label>
			    <input type="text" class="form-control" name="amount" placeholder="Product Price">
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Availabilty</label>
			    <select class="form-control" name="availabilty">
			    	<option value="1">In stock</option>
			    	<option value="0">Out of Stock</option>
			    </select>
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Type</label>
			    <select class="form-control" name="type">
			    	<option value="null">Normal</option>
			    	<option value="featured">Featured</option>
			    	<option value="sale">Sale</option>
			    </select>
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleInputPassword1">Description</label>
			    <textarea class="form-control" name="description" rows="4" style="resize: none;" placeholder="Description"></textarea>
			  </div>
			  <div class="form-group col-md-6">
			  	<label for="exampleInputPassword1">Product Images</label>
			  	<input type="file" class="form-control" id="images" name="image[]" onchange="preview_images();" multiple/>
			  	 <div class="row" id="image_preview" style="height: 120px; margin-top: 5px;">
			  	 </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Add Product</button>
		</form>
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
<script type="text/javascript">
	document.querySelector("#category").addEventListener('change', function(){
		let category = <?php print($category) ?>;
		let newCategory = category[this.value];
		let brand_options = newCategory.brand;
		let brands = document.querySelector("#brand");
		let length = brands.options.length;
		for (i = length-1; i >= 0; i--) {
		  brands.options[i] = null;
		}
		
		 for (var i=0; i<brand_options.length; i++) {
			let option = document.createElement("option");
		 	option.text = brand_options[i].name.charAt(0).toUpperCase()+brand_options[i].name.slice(1);
		 	option.value = brand_options[i].id;
		 	brands.add(option);
		 }
	});
	
	

	function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img class='img-responsive' style='margin:2px; height:50px; width:50px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
 }
}
        $("#file").on('change', function() {
          "use strict";

          // create an empty array for the files to reside.
          window.filesToUpload = [];

          if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function(i, img) {
              var reader = new FileReader(),
                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                preview = newElement.find("img");

              reader.onloadend = function() {
                preview.attr("src", reader.result);
                preview.attr("alt", img.name);
              };

              try {
                window.filesToUpload.push(document.getElementById("file").files[i]);
              } catch (e) {
                console.log(e.message);
              }

              if (img) {
                reader.readAsDataURL(img);
              } else {
                preview.src = "";
              }

              newElement.appendTo("#filediv");
            });
          }
        });
</script>
@endsection