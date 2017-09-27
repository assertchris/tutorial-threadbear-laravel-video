@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Account
                </div>

                <div class="panel-body">
                    @foreach ($plans as $plan)
                    {{ $plan["name"] }}
                    •
                    <a href="{{ route('account.change', [$plan["id"]]) }}" onclick="event.preventDefault();
                                    document.getElementById('plan-change-{{ $plan["id"] }}').submit();">
                        change to this
                    </a>

                    <form id="plan-change-{{ $plan["id"] }}" action="{{ route('account.change', [$plan["id"]]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field("PATCH") }}
                    </form>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
