@extends('layouts.admin')

@section('content')
    @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-user', 'head' => trans('content.confirm_delete_user')])

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('content.users') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th class="text-center">{{ trans('content.avatar') }}</th>
                    <th class="text-center">{{ trans('content.user_name') }}</th>
                    <th class="text-center">{{ trans('auth.registration_via_social_networks') }}</th>
                    <th class="text-center">{{ trans('content.birthday_year') }}</th>
                    <th class="text-center">{{ trans('content.status') }}</th>
                    <th class="text-center">{{ trans('content.delete') }}</th>
                </tr>
                @foreach ($data['users'] as $user)
                    <tr role="row" id="{{ 'user_'.$user->id }}">
                        <td class="text-center image avatar">@include('admin._user_avatar_block',['user' => $user])</td>
                        <td class="text-center head">@include('admin._user_href_block',['user' => $user])</td>
                        <td class="text-center head">
                            @if ($user->fb_id)
                                <i class="fa fa-facebook-official"></i>
                            @elseif ($user->vk_id)
                                <i class="fa fa-vk"></i>
                            @elseif ($user->email && !$user->password)
                                <i class="fa fa-google-plus"></i>
                            @endif
                        </td>
                        <td class="text-center">{{ $user->birthday_year }}</td>
                        <td class="text-center">
                            @include('admin._status_block', ['status' => $user->admin, 'trueLabel' => trans('auth.admin'), 'falseLabel' => trans('auth.user')])
                            @include('admin._status_block', ['status' => $user->active, 'trueLabel' => trans('content.user_active'), 'falseLabel' => trans('content.user_not_active')])
                        </td>
                        <td class="delete"><span del-data="{{ $user->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="panel-body">
            @include('admin._add_button_block',['href' => 'users/add', 'text' => trans('content.add_user')])
        </div>
    </div>
@endsection