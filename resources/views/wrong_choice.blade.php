@extends('layouts.static')
@section('content')
<div class="flex-center full-height">
    <div class="content">
        <div class="title m-b-md">{{ trans('content.you_must_open_this_in_app') }}</div>

        <div class="links">
            <a href="{{ url(Request::path()) }}">{{ url(Request::path()) }}</a>
        </div>
    </div>
</div>
@endsection