
@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.feed') }}</h4>
        </div>
        <div class="panel-body">
            @if (count($data['feeds']))
                @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-feed', 'head' => trans('content.confirm_delete_feed')])
                <table class="table datatable-basic table-items">
                    <tr>
                        <th class="text-center">{{ trans('content.avatar') }}</th>
                        <th class="text-center">{{ trans('content.user_why_created_request') }}</th>
                        <th class="text-center">{{ trans('content.recipe') }}</th>
                        <th class="text-center">{{ trans('content.comment') }}</th>
                        <th class="text-center">{{ trans('content.status') }}</th>
                        <th class="text-center">{{ trans('content.delete') }}</th>
                    </tr>
                    @foreach ($data['feeds'] as $feed)
                        <tr role="row" id="{{ 'feed_'.$feed->id }}">
                            <td class="text-center image avatar">@include('admin._user_avatar_block',['user' => $feed->user])</td>
                            <td class="text-center head"><a href="/admin/users?id={{ $feed->user->id }}">{{ $feed->user->name }}</a><br>{{ $feed->created_at }}</td>
                            <td class="text-left"><a href="/admin/feed?id={{ $feed->id }}">@include('admin._cropped_content_block',['croppingContent' => $feed->recipe, 'length' => 300])</a></td>
                            <td class="text-left">@include('admin._cropped_content_block',['croppingContent' => $feed->comment, 'length' => 300])</td>
                            <td class="text-center">@include('admin._status_block', ['status' => $feed->paid, 'trueLabel' => trans('content.paid'), 'falseLabel' => trans('content.not_paid')])</td>
                            <td class="delete"><span del-data="{{ $feed->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                        </tr>
                    @endforeach
                </table>
            @else
                <h2 class="text-center">{{ trans('content.no_content') }}</h2>
            @endif
        </div>
    </div>
@endsection