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

                <div class="col-md-3 col-sm-12 col-xs-12 avatar">
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
                                'name' => 'receive_messages',
                                'label' => trans('content.receive_messages'),
                                'checked' => isset($data['user']) ? $data['user']->receive_messages : 0
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
    @if (isset($data['user']))
        @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-user-param', 'head' => trans('content.confirm_delete_user_param')])
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.user_progress') }}</h4>
            </div>
            <div class="panel-body">
                @php $xAxis = []; @endphp
                @foreach($data['user']->params as $param)
                    @php $xAxis[] = $param->created_at->format('d.m.Y'); @endphp
                @endforeach
                @include('admin._chart_container_block', [
                    'xAxis' => $xAxis,
                    'legend' => [
                        trans('content.height'),
                        trans('content.weight'),
                        trans('content.waist_girth'),
                        trans('content.hip_girth'),
                    ],
                    'chartId' => 'user-progress'
                ])
                <form class="form-horizontal" action="{{ url('/admin/user-params') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $data['user']->id }}">
                    <table class="table datatable-basic table-items">
                        <tr>
                            <th class="text-center">{{ trans('content.height') }}</th>
                            <th class="text-center">{{ trans('content.weight') }}</th>
                            <th class="text-center">{{ trans('content.waist_girth') }}</th>
                            <th class="text-center">{{ trans('content.hip_girth') }}</th>
                            <th class="text-center">{{ trans('content.created_at') }}</th>
                            <th class="text-center">{{ trans('content.delete') }}</th>
                        </tr>
                        @include('admin._user_params_table_row_block',['param' => null])
                        @foreach($data['user']->params as $k => $param)
                            @include('admin._user_params_table_row_block',['param' => $param])
                            @foreach(['height','weight','waist_girth','hip_girth'] as $i => $item)
                                <script>window.statisticsData[0].dataHorAxis[parseInt("{{ $i }}")].data[parseInt("{{ count($data['user']->params)-$k-1 }}")] = parseInt("{{ $param[$item] }}");</script>
                            @endforeach
                        @endforeach
                    </table>
                    @include('admin._save_button_block')
                </form>
            </div>
        </div>
    @endif
@endsection