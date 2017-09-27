@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $product->name }}</div>

                <div class="panel-body">
                    {{ $product->description}}<br>
                    <strong>{{ $product->price}}</strong><br>
                    <a href="{{ route('products.purchase', [$product]) }}" onclick="event.preventDefault();
                                    document.getElementById('product-purchase-{{ $product->id }}').submit();">
                        purchase
                    </a>

                    <form id="product-purchase-{{ $product->id }}" action="{{ route('products.purchase', [$product]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
