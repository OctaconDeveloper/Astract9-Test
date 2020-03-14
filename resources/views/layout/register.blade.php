 
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New Vendor Signup!</h2>
						<form action="{{ route('createvendor') }}" method="post">
							@csrf
							@if($message ?? '')
								 <div class="alert alert-success">
								 	<ul>
								 		<li>{{ $message ?? '' }}</li>
								 	</ul>
								 </div>
							@endif
							<input type="text" placeholder="Businesss Name" name="business_name" />
							<input type="email" placeholder="Businesss Email Address" name="email" />
							<input type="text" placeholder="Businesss Phone" name="business_phone" />
							<input type="password" placeholder="Password" name="password" />
							<input type="password" placeholder="Password Confirmation" name="password_confirmation" />
							<textarea placeholder="Businesss Description" rows="5" name="business_description"></textarea>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>