@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <img src="data:image/png;base64,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"
                 alt="User's profile image" class="rounded-circle">
        </div>
        <div class="col-9">

        </div>

    </div>
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
