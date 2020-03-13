@extends('layout.app')
@section('title', 'Home | E-Shopper')
@section('content')
@include('layout.slider')
    <section>
        <div class="container">
            <div class="row">
                @include('layout.sidebar')
                <div class="col-sm-9 padding-right">
                    @include('layout.feature_products')
                    @include('layout.random_category')
                    @include('layout.recommended_product')
                </div>
            </div>
        </div>
    </section> 
@endsection