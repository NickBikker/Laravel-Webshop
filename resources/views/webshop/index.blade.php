@extends('layouts.master')

@section('title')
Laravel Webshop
@endsection

@section('content')

@foreach($products->chunk(4) as $productChunk)
<div class="card-deck row mt-5">
    @foreach($productChunk as $product)

    <div class="card col-md-3">
        <div class="background_img" style="background-image:url({{ $product->imagepath }});">

        </div>
        <div class="card-body">
            <a href="/product_page/{{ $product->id }}">
                <h5 class="card-title">{{ $product->title }}</h5>
            </a>
            <p class="card-text">{{ $product->description }}</p>
        </div>
        <div class="card-footer">
            <div class="price float-left">$ {{ $product->price }},-</div>
            <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add</a>
        </div>
    </div>

    @endforeach
</div>
@endforeach



@endsection