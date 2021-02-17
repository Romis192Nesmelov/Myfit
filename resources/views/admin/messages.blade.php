@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.messages') }}</h4>
        </div>
        <div class="panel-body">
            @if (count($data['messages']))
                @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-message', 'head' => trans('content.confirm_delete_message')])
                <table class="table datatable-basic table-items">
                    <tr>
                        <th class="text-center">{{ trans('content.user_why_created_message') }}</th>
                        <th class="text-center">{{ trans('content.title') }}</th>
                        <th class="text-center">{{ trans('content.message_text') }}</th>
                        <th class="text-center">{{ trans('content.created_at') }}</th>
                        <th class="text-center">{{ trans('content.status') }}</th>
                        <th class="text-center">{{ trans('content.delete') }}</th>
                    </tr>
                    @foreach ($data['messages'] as $message)
                        @php
                            if ($message->feed) {
                                $user = $message->feed->user;
                                $url = 'feed?id='.$message->feed->id;
                                $head = trans('messages.new_feed_head');
                                $text = trans('messages.new_request_text',[
                                    'user' => view('admin._user_href_block',['user' => $message->feed->user])->render(),
                                    'date' => $message->feed->created_at->format('d.n.Y'),
                                    'status' => $message->feed->paid ? trans('content.payed') : trans('content.not_payed')
                                ]);
                            } elseif ($message->videoAdvice) {
                                $user = $message->videoAdvice->user;
                                $url = 'video-advice?id='.$message->videoAdvice->id;
                                $head = trans('messages.new_video_advice_head');
                                $text = trans('messages.new_request_text',[
                                    'user' => view('admin._user_href_block',['user' => $message->videoAdvice->user])->render(),
                                    'date' => $message->videoAdvice->created_at->format('d.m.Y'),
                                    'status' => $message->videoAdvice->paid ? trans('content.payed') : trans('content.not_payed')
                                ]);
                            } else {
                                $user = $message->payment->user;
                                $url = 'payments?id='.$message->payment->id;
                                $head = trans('messages.new_payment_head', ['value' => $message->payment->value]);
                                $text = trans('messages.new_payment_text',[
                                    'user' => view('admin._user_href_block',['user' => $message->payment->user])->render(),
                                    'date' => $message->payment->created_at->format('d.m.Y'),
                                    'value' => $message->payment->value
                                ]);
                            }
                        @endphp
                        <tr role="row" id="{{ 'message_'.$message->id }}">
                            <td class="text-center head">@include('admin._user_href_block',['user' => $user])</td>
                            <td class="text-center"><a href="{{ url('/admin/'.$url) }}">{{ $head }}</a></td>
                            <td class="text-left">{!! $text !!}</td>
                            <td class="text-center">{{ $message->created_at->format('d.m.Y') }}</td>
                            <td class="text-center">@include('admin._status_block', ['status' => $message->new, 'trueLabel' => trans('content.new_message'), 'falseLabel' => trans('content.not_new_message')])</td>
                            <td class="delete"><span del-data="{{ $message->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-center">{{ trans('content.no_content') }}</h2>
            @endif
        </div>
    </div>
@endsection