@extends('layouts.master')

@section('title')
Laravel Webshop
@endsection

@section('content')

@foreach($products->chunk(4) as $productChunk)
<div class="card-deck row">
@foreach($productChunk as $product)
    
        <div class="card col-md-3">
            <div class="background_img" style="background-image:url({{ $product->imagepath }});">

            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <div class="price float-left">$ {{ $product->price }}</div>
                <a href="#" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add to card</a>
            </div>
        </div>
    
    @endforeach
</div>
@endforeach



@endsection