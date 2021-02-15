@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{!! isset($data['user']) ? trans('content.editing_user').' <b>'.$data['user']->email.'</b>' : trans('content.adding_user') !!}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/user') }}" method="post">
                {{ csrf_field() }}
                @if (isset($data['user']))
                    <input type="hidden" name="id" value="{{ $data['user']->id }}">
                @endif

                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('admin._image_block', [
                        'head' => trans('content.avatar'),
                        'preview' => isset($data['user']) ? $data['user']->avatar : null,
                        'full' => isset($data['user']) ? $data['user']->avatar : null,
                        'name' => 'avatar'
                    ])
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._radio_button_block', [
                                'name' => 'admin',
                                'values' => [
                                    ['val' => 1, 'descript' => trans('auth.admin')],
                                    ['val' => 0, 'descript' => trans('auth.user')]
                                ],
                                'activeValue' => isset($data['user']) ? $data['user']->admin : 0
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'active',
                                'label' => trans('content.user_active'),
                                'checked' => isset($data['user']) ? $data['user']->active : 1
                            ])
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._input_block', [
                                'label' => trans('content.user_name'),
                                'name' => 'name',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('content.user_name'),
                                'value' => isset($data['user']) ? $data['user']->name : ''
                            ])

                            @include('admin._input_block', [
                                'label' => 'E-mail',
                                'name' => 'email',
                                'type' => 'email',
                                'max' => 100,
                                'placeholder' => 'E-mail',
                                'value' => isset($data['user']) ? $data['user']->email : ''
                            ])

                            @include('admin._combobox_group_block',[
                                'label' => trans('content.location'),
                                'name' => 'location',
                                'useNull' => true,
                                'items' => $data['locations'],
                                'selected' => isset($data['user']) ? $data['user']->location : ''
                            ])

                            @include('admin._combobox_group_block',[
                                'label' => trans('content.birthday_year'),
                                'name' => 'birthday_year',
                                'useNull' => true,
                                'items' => $data['years'],
                                'selected' => isset($data['user']) ? $data['user']->birthday_year : ''
                            ])

                            <div class="panel panel-flat">
                                @if (isset($data['user']))
                                    <div class="panel-heading">
                                        <h4 class="text-grey-300">{{ trans('content.change_password_notice') }}</h4>
                                    </div>
                                @endif

                                <div class="panel-body">
                                    @include('admin._input_block', [
                                        'label' => trans('auth.password'),
                                        'name' => 'password',
                                        'type' => 'password',
                                        'max' => 50,
                                        'placeholder' => trans('auth.password'),
                                        'value' => ''
                                    ])

                                    @include('admin._input_block', [
                                        'label' => trans('auth.confirm_password'),
                                        'name' => 'password_confirmation',
                                        'type' => 'password',
                                        'max' => 50,
                                        'placeholder' => trans('auth.confirm_password'),
                                        'value' => ''
                                    ])

                                </div>
                            </div>
                            @include('admin._save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection