@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                    <a href="{{ route("products.create") }}">Add Product</a>
                </div>

                <div class="panel-body">
                    @foreach ($products as $product)
                    <a href="{{ route("products.edit", [$product]) }}">
                        {{ $product->name }}
                    </a>
                    •
                    <a href="{{ route('products.destroy', [$product]) }}" onclick="event.preventDefault();
                                    document.getElementById('product-delete-{{ $product->id }}').submit();">
                        delete
                    </a>

                    <form id="product-delete-{{ $product->id }}" action="{{ route('products.destroy', [$product]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
