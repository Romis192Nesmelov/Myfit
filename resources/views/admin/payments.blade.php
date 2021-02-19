@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('content.payments') }}</h3>
        </div>
        <div class="panel-body">
            @if (count($data['payments']))
                @include('admin._payments_table_block',['payments' => $data['payments']])
            @else
                <h2 class="text-center">{{ trans('content.no_content') }}</h2>
            @endif
        </div>
        <div class="panel-body">
            @include('admin._add_button_block',['href' => 'payment/add', 'text' => trans('content.add_payment')])
        </div>
    </div>
@endsection