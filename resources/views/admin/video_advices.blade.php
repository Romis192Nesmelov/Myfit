@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.video_advice') }}</h4>
        </div>
        <div class="panel-body">
            @if (count($data['advices']))
                @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-video-advice', 'head' => trans('content.confirm_delete_video_advice')])
                <table class="table datatable-basic table-items">
                    <tr>
                        <th class="text-center">{{ trans('content.avatar') }}</th>
                        <th class="text-center">{{ trans('content.user_why_created_request') }}</th>
                        <th class="text-center">{{ trans('content.duration') }}</th>
                        <th class="text-center">{{ trans('content.status') }}</th>
                        <th class="text-center">{{ trans('content.editing') }}</th>
                        <th class="text-center">{{ trans('content.delete') }}</th>
                    </tr>
                    @foreach ($data['advices'] as $advice)
                        <tr role="row" id="{{ 'advice_'.$advice->id }}">
                            <td class="text-center image">@include('admin._user_avatar_block',['user' => $advice->user])</td>
                            <td class="text-center head"><a href="/admin/users?id={{ $advice->user->id }}">{{ $advice->user->name }}</a><br>{{ $advice->created_at->format('d.m.Y') }}</td>
                            <td class="text-center head">{{ $advice->duration.trans('content.minutes') }}</td>
                            <td class="text-center">@include('admin._status_block', ['status' => $advice->paid, 'trueLabel' => trans('content.paid'), 'falseLabel' => trans('content.not_paid')])</td>
                            <td class="text-center"><a href="/admin/video-advice?id={{ $advice->id }}"><span class="icon-pencil5"></span></a></td>
                            <td class="delete"><span del-data="{{ $advice->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-center">{{ trans('content.no_content') }}</h2>
            @endif
        </div>
    </div>
@endsection