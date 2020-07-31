@extends('layouts.static')
@section('content')
    <div class="flex-center">
        <div class="content">
            <h1>{{ trans('policy.head') }}</h1>
            {!! trans('policy.intro') !!}
            <h2>{{ trans('policy.sub_head1') }}</h2>
            {!! trans('policy.part1') !!}
            <h2>{{ trans('policy.sub_head2') }}</h2>
            {!! trans('policy.part2') !!}
            <h2>{{ trans('policy.sub_head3') }}</h2>
            {!! trans('policy.part3') !!}
            <h2>{{ trans('policy.sub_head4') }}</h2>
            {!! trans('policy.part4') !!}
            <h2>{{ trans('policy.sub_head5') }}</h2>
            {!! trans('policy.part5') !!}
            <h2>{{ trans('policy.sub_head6') }}</h2>
            {!! trans('policy.part6') !!}
            <h2>{{ trans('policy.sub_head7') }}</h2>
            {!! trans('policy.part7') !!}
            {!! trans('policy.final') !!}
        </div>
    </div>
@endsection