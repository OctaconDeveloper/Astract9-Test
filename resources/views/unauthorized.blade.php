@extends('layout.app')
@section('title', 'Error 403')
@section('content')
    <div class="container text-center">
		<div class="logo-404">
			<a href="/">
				<img src="{{asset('images/home/logo.png')}}" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="images/404/404.png" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> You dont have permission to view this Page</h1>
			<p>Uh... Let take you back to a safe place.</p>
			<h2><a href="/">Bring me back Home</a></h2>
		</div>
	</div>
@endsection