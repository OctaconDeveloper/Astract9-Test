@extends('layout.app')
@section('title', 'Product | ' .$product->name)
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('layout.sidebar')
                <div class="col-sm-9 padding-right">
                	@include('layout.product_details')
                    @include('layout.product_extras')
                    @include('layout.recommended_product')
                </div>
            </div>
        </div>
    </section> 
@endsection