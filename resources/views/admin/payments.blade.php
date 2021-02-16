@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('content.payments') }}</h3>
        </div>
        <div class="panel-body">
            @if (count($data['payments']))
                @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-payment', 'head' => trans('content.confirm_delete_payment')])
                <table class="table datatable-basic table-items">
                    <tr>
                        <th class="text-center">{{ trans('content.avatar') }}</th>
                        <th class="text-center">{{ trans('content.user_why_created_payment') }}</th>
                        <th class="text-center">{{ trans('content.program').'/'.trans('content.training') }}</th>
                        <th class="text-center">{{ trans('content.payment_value').'/'.trans('content.price') }}</th>
                        <th class="text-center">{{ trans('content.status') }}</th>
                        <th class="text-center">{{ trans('content.delete') }}</th>
                    </tr>
                    @foreach ($data['payments'] as $payment)
                        <tr role="row" id="{{ 'payment_'.$payment }}">
                            <td class="text-center image avatar">@include('admin._user_avatar_block',['user' => $payment->user])</td>
                            <td class="text-center head"><a href="/admin/users?id={{ $payment->user->id }}">{{ $payment->user->name }}</a></td>
                            <td class="text-center"><a href="/admin/payments?id={{ $payment->id }}">{{ trans('content.payment_by',['date' => $payment->created_at]) }}</a></td>
                            <td class="text-center {{ $payment->value < $payment->training->price ? 'text-danger' : 'text-green-800' }}">
                                @include('admin._money_format_block',['value' => $payment->value])/
                                @include('admin._money_format_block',['value' => $payment->training->price])
                            </td>
                            <td class="text-center">@include('admin._status_block', ['status' => $payment->active, 'trueLabel' => trans('content.payment_active'), 'falseLabel' => trans('content.payment_not_active')])</td>
                            <td class="delete"><span del-data="{{ $payment->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-center">{{ trans('content.no_content') }}</h2>
            @endif
        </div>
        <div class="panel-body">
            @include('admin._add_button_block',['href' => 'payment/add', 'text' => trans('content.add_payment')])
        </div>
    </div>
@endsection