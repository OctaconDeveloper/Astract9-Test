 @extends('layout.app')
@section('title', 'Login')
@section('content')
<section id="form" style="margin-top: -20px;"><!--form-->
		<div class="container">
					@include('layout.errrors')
			<div class="row">
				@include('layout.login')
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				@include('layout.register')
			</div>
		</div>
	</section><!--/form-->
@endsection