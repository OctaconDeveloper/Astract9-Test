
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{ route('newlogin') }}" method="post">
							@csrf
							@if($error ?? '')
								 <div class="alert alert-danger">
								 	<ul>
								 		<li>{{ $error ?? '' }}</li>
								 	</ul>
								 </div>
							@endif
							<input type="email" name="email" placeholder="Business Email" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>