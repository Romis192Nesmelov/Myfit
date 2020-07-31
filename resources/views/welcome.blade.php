@extends('layouts.static')
@section('content')
<div class="flex-center full-height">
    <div class="content">
        <div class="title m-b-md">MyFit</div>

        <div class="links">
            <a href="{{ url('/policy') }}">{{ trans('content.privacy_policy') }}</a>
        </div>
    </div>
</div>
@endsection