@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">
                    @foreach ($products as $product)
                        {{ $product->name }}<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
