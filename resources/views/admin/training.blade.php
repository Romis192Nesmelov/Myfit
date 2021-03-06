
@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">
                {!!
                isset($data['training'])
                ? trans('content.editing_training',['training' => $data['training']->name])
                : trans('content.adding_training')
                !!}
            </h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/training') }}" method="post">
                {{ csrf_field() }}
                @if (isset($data['training']))
                    <input type="hidden" name="id" value="{{ $data['training']->id }}">
                @endif

                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('admin._image_block', [
                        'head' => trans('content.photo'),
                        'preview' => isset($data['training']) ? $data['training']->photo : null,
                        'full' => isset($data['training']) ? $data['training']->photo : null,
                        'name' => 'photo'
                    ])

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">{{ trans('content.program') }}</h5>
                        </div>
                        <div class="panel-body">
                            @include('admin._select_block',[
                                'name' => 'program_id',
                                'values' => $programs,
                                'selected' => isset($data['training']) ? $data['training']->program_id : (Request::has('program_id') ? Request::input('program_id') : 1)
                            ])
                        </div>
                    </div>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">{{ trans('content.complexity') }}</h5>
                        </div>
                        <div class="panel-body">
                            @include('admin._radio_button_block', [
                                'name' => 'complexity',
                                'values' => [
                                    ['val' => 1, 'descript' => trans('content.very_low')],
                                    ['val' => 2, 'descript' => trans('content.low')],
                                    ['val' => 3, 'descript' => trans('content.low_medium')],
                                    ['val' => 4, 'descript' => trans('content.medium')],
                                    ['val' => 5, 'descript' => trans('content.high_medium')],
                                    ['val' => 6, 'descript' => trans('content.high')],
                                ],
                                'activeValue' => isset($data['training']) ? $data['training']->complexity : 1
                            ])
                        </div>
                    </div>

                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._input_block', [
                                'label' => trans('content.duration').' ('.trans('content.weeks').')',
                                'name' => 'duration',
                                'type' => 'number',
                                'max' => 50,
                                'placeholder' => trans('content.duration'),
                                'value' => isset($data['training']) ? $data['training']->duration : 1
                            ])

                            @include('admin._input_block', [
                                'label' => trans('content.price').' ₽',
                                'name' => 'price',
                                'type' => 'number',
                                'max' => 10000,
                                'placeholder' => trans('content.duration'),
                                'value' => isset($data['training']) ? $data['training']->price : 1
                            ])

                            @include('admin._input_block', [
                                'addClass' => 'number-style',
                                'label' => trans('content.periodicity'),
                                'name' => 'periodicity',
                                'type' => 'text',
                                'min' => 1,
                                'max' => 3,
                                'placeholder' => trans('content.periodicity'),
                                'value' => isset($data['training']) ? $data['training']->periodicity : 1
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'need_previous_completed',
                                'label' => trans('content.need_previous_completed'),
                                'checked' => isset($data['training']) ? $data['training']->need_previous_completed : 0
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'with_cardio',
                                'label' => trans('content.with_cardio'),
                                'checked' => isset($data['training']) ? $data['training']->with_cardio : 0
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'its_cardio',
                                'label' => trans('content.its_cardio'),
                                'checked' => isset($data['training']) ? $data['training']->its_cardio : 0
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'active',
                                'label' => trans('content.training_active'),
                                'checked' => isset($data['training']) ? $data['training']->active : 1
                            ])
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._input_block', [
                                'label' => trans('content.training_name'),
                                'name' => 'name',
                                'type' => 'text',
                                'placeholder' => trans('content.training_name'),
                                'value' => isset($data['training']) ? $data['training']->name : ''
                            ])

                            @include('admin._input_block', [
                                'label' => trans('content.equipment'),
                                'name' => 'equipment',
                                'type' => 'text',
                                'placeholder' => trans('content.equipment'),
                                'value' => isset($data['training']) ? $data['training']->equipment : ''
                            ])


                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h5 class="panel-title">{{ trans('content.warning') }}</h5>
                                </div>
                                <div class="panel-body">
                                    @include('admin._input_block', [
                                        'label' => trans('content.warning_title'),
                                        'name' => 'warning_title',
                                        'type' => 'text',
                                        'placeholder' => trans('content.warning_title'),
                                        'value' => isset($data['training']) ? $data['training']->warning_title : ''
                                    ])

                                    @include('admin._textarea_block',[
                                        'label' => trans('content.warning_description'),
                                        'name' => 'warning_description',
                                        'value' => isset($data['training']) ? $data['training']->warning_description : '',
                                        'simple' => true
                                    ])

                                    @include('admin._input_block', [
                                        'label' => trans('content.recommendation_title'),
                                        'name' => 'recommendation_title',
                                        'type' => 'text',
                                        'placeholder' => trans('content.recommendation_title'),
                                        'value' => isset($data['training']) ? $data['training']->recommendation_title : ''
                                    ])

                                    @include('admin._textarea_block',[
                                        'label' => trans('content.recommendation_description'),
                                        'name' => 'recommendation_description',
                                        'value' => isset($data['training']) ? $data['training']->recommendation_description : '',
                                        'simple' => true
                                    ])
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">{{ trans('content.warmup') }}</h5>
                                    </div>
                                    <div class="panel-body">
                                        @include('admin._input_block', [
                                            'label' => trans('content.warmup_warning_title'),
                                            'name' => 'warmup_warning_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.warmup_warning_title'),
                                            'value' => isset($data['training']) ? $data['training']->warmup_warning_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.warmup_warning_description'),
                                            'name' => 'warmup_warning_description',
                                            'value' => isset($data['training']) ? $data['training']->warmup_warning_description : '',
                                            'simple' => true
                                        ])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">{{ trans('content.hitch') }}</h5>
                                    </div>
                                    <div class="panel-body">
                                        @include('admin._input_block', [
                                            'label' => trans('content.hitch_warning_title'),
                                            'name' => 'hitch_warning_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.hitch_warning_title'),
                                            'value' => isset($data['training']) ? $data['training']->hitch_warning_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.hitch_warning_description'),
                                            'name' => 'hitch_warning_description',
                                            'value' => isset($data['training']) ? $data['training']->hitch_warning_description : '',
                                            'simple' => true
                                        ])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">{{ trans('content.main_content') }}</h5>
                                    </div>
                                    <div class="panel-body">
                                        @include('admin._input_block', [
                                            'label' => trans('content.main_warning_title'),
                                            'name' => 'main_warning_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.main_warning_title'),
                                            'value' => isset($data['training']) ? $data['training']->main_warning_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.main_warning_description'),
                                            'name' => 'main_warning_description',
                                            'value' => isset($data['training']) ? $data['training']->main_warning_description : '',
                                            'simple' => true
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.main_text'),
                                            'name' => 'main_text',
                                            'value' => isset($data['training']) ? $data['training']->main_text : '',
                                            'simple' => true
                                        ])
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">{{ trans('content.cardio') }}</h5>
                                    </div>
                                    <div class="panel-body">
                                        @include('admin._input_block', [
                                            'label' => trans('content.main_cardio_title'),
                                            'name' => 'main_cardio_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.main_cardio_title'),
                                            'value' => isset($data['training']) ? $data['training']->main_cardio_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.main_cardio_description'),
                                            'name' => 'main_cardio_description',
                                            'value' => isset($data['training']) ? $data['training']->main_cardio_description : '',
                                            'simple' => true
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (isset($data['training']))
        @include('admin._modal_delete_block',['modalId' => 'delete-video-modal', 'function' => 'delete-video', 'head' => trans('content.confirm_delete_video')])
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.video') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['training']->videos))
                    <form class="form-horizontal" action="{{ url('/admin/videos') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data['training']->id }}">
                        @foreach($data['training']->videos as $video)
                            @include('admin._video_container_block',['id' => $video->id, 'videoHref' => $video->video])
                        @endforeach
                        @include('admin._video_container_block',['name' => 'video_add', 'videoHref' => ''])
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('admin._save_button_block')
                        </div>
                    </form>
                @else
                    <h2 class="text-center">{{ trans('content.no_content') }}</h2>
                @endif
            </div>
        </div>

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.training_goals') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['training']->goals))
                    @include('admin._modal_delete_block',['modalId' => 'delete-goal-modal', 'function' => 'delete-day', 'head' => trans('content.confirm_delete_goal')])
                    <form class="form-horizontal" action="{{ url('/admin/goals') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data['training']->id }}">
                        <table class="table datatable-basic table-items">
                            <tr>
                                <th class="id">#</th>
                                <th></th>
                                <th class="text-left">{{ trans('content.goal') }}</th>
                                <th class="text-center">{{ trans('content.created_at') }}</th>
                                <th class="text-center">{{ trans('content.updated_at') }}</th>
                                <th class="text-center">{{ trans('content.delete') }}</th>
                            </tr>
                            @foreach ($data['training']->goals as $k => $goal)
                                <tr role="row" id="{{ 'goal_'.$goal->id }}">
                                    <td class="id">{{ $k+1 }}</td>
                                    <th></th>
                                    <td class="text-left">
                                        @include('admin._input_block', [
                                            'name' => 'goal_id'.$goal->id,
                                            'type' => 'text',
                                            'placeholder' => trans('content.goal'),
                                            'value' => $goal->goal
                                        ])
                                    </td>
                                    <td class="text-center">{{ $goal->created_at->format('d.m.Y') }}</td>
                                    <td class="text-center">{{ $goal->updated_at->format('d.m.Y') }}</td>
                                    <td class="delete"><span del-data="{{ $goal->id }}" modal-data="delete-goal-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                                </tr>
                            @endforeach
                            <tr role="row">
                                <td class="id"></td>
                                <th></th>
                                <td class="text-left">
                                    @include('admin._input_block', [
                                        'name' => 'goal_add',
                                        'type' => 'text',
                                        'placeholder' => trans('content.add_goal'),
                                        'value' => ''
                                    ])
                                </td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="delete"></td>
                            </tr>
                        </table>
                        @include('admin._save_button_block')
                    </form>
                @else
                    <h2 class="text-center">{{ trans('content.no_content') }}</h2>
                @endif
            </div>
        </div>

        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.users_who_had_buy_the_training') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['training']->payments))
                    @include('admin._payments_table_block',['payments' => $data['training']->payments])
                @else
                    <h2 class="text-center">{{ trans('content.no_content') }}</h2>
                @endif
            </div>
        </div>
    @endif
@endsection