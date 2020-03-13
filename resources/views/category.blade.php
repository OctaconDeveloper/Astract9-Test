@extends('layout.app')
@section('title', $data->category->name.' || '.$data->name)
@section('content')
    <section>
        <div class="container">
            <div class="row">
                @include('layout.sidebar')
                <div class="col-sm-9 padding-right">
                    @include('layout.data_details')                  
                    @include('layout.random_category')
                    @include('layout.recommended_product')
                </div>
            </div>
        </div>
    </section>  
@endsection