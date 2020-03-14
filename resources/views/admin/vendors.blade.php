 @extends('layout.admin.app')
@section('title', 'Vendor List') 
@section('content')
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendors</h1>
      </div>
      <table class="table table-striped table-hover">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Vendor Name</th>
	      <th scope="col">Vendor Email</th>
	      <th scope="col">Vendor Phone</th>
	      <th scope="col">Vendor Status</th>
	      <th scope="col"></th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@forelse($vendor as $key => $vend)
	    <tr>
	      <th scope="row">{{$key+1}}</th>
	      <td>{{$vend->name}}</td>
	      <td>{{$vend->user->email}}</td>
	      <td>{{$vend->phone}}</td>
	      <td>

	      	{!!
	      		$vend->status == 1 ? 
	      		'<span class="alert-success">Active</span>' : 
	      		'<span class="alert-danger">Inactive</span>' 
	      	!!}
	      </td>
	      <td>
	      	{!!
	      		$vend->status == 1 ? 
	      		'<a href="/update_vendor/'.$vend->id.'/0" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Deactivate '.$vend->name.'">
	      			Deactivate
	      		</a>' :
	      		'<a href="/update_vendor/'.$vend->id.'/1" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Activate '.$vend->name.'">
	      			Activate
	      		</a>'
	      		
	      	!!}
	      </td>
	      <td>
	      	<a href="/delete_vendor/{{$vend->id}}" class="btn btn-danger"><span data-feather="trash" data-toggle="tooltip" data-placement="top" title="Delete {{$vend->name}}"></span></a>
	      </td>
	    </tr>
	    @empty
	    <tr>
	      <th colspan="6">No Vendor Listed</th>
	  </tr>
	    @endforelse
	  </tbody>
	</table>


  </main>

@endsection