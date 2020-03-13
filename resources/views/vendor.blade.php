@extends('layout.app')
@section('title', 'Vendor | '.$vendor->name)
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('layout.sidebar')
                <div class="col-sm-9 padding-right">
                  @include('layout.vendor_products')
                    @include('layout.random_category')
                    @include('layout.recommended_product')
                </div>
            </div>
        </div>
    </section>  
@endsection