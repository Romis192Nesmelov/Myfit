
@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{!! isset($data['training']) ? trans('content.editing_training',['program' => $data['training']->program->title]).' '.$data['training']->duration.' '.trans('content.weeks').'/'.$data['training']->periodicity : trans('content.adding_training') !!}</h4>
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
                                'label' => trans('content.periodicity'),
                                'name' => 'periodicity',
                                'type' => 'text',
                                'placeholder' => trans('content.periodicity'),
                                'value' => isset($data['training']) ? $data['training']->periodicity : '1 раз в неделю'
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
                                'label' => trans('content.equipment'),
                                'name' => 'equipment',
                                'type' => 'text',
                                'placeholder' => trans('content.equipment'),
                                'value' => isset($data['training']) ? $data['training']->equipment : ''
                            ])

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">{{ trans('content.description') }}</h5>
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

                                        @include('admin._input_block', [
                                            'label' => trans('content.warmup_recommendation_title'),
                                            'name' => 'warmup_recommendation_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.warmup_recommendation_title'),
                                            'value' => isset($data['training']) ? $data['training']->warmup_recommendation_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.warmup_recommendation_description'),
                                            'name' => 'warmup_recommendation_description',
                                            'value' => isset($data['training']) ? $data['training']->warmup_recommendation_description : '',
                                            'simple' => true
                                        ])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
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

                                        @include('admin._input_block', [
                                            'label' => trans('content.main_recommendation_title'),
                                            'name' => 'main_recommendation_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.main_recommendation_title'),
                                            'value' => isset($data['training']) ? $data['training']->main_recommendation_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.main_recommendation_description'),
                                            'name' => 'main_recommendation_description',
                                            'value' => isset($data['training']) ? $data['training']->main_recommendation_description : '',
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

                                        @include('admin._input_block', [
                                            'label' => trans('content.hitch_recommendation_title'),
                                            'name' => 'hitch_recommendation_title',
                                            'type' => 'text',
                                            'placeholder' => trans('content.hitch_recommendation_title'),
                                            'value' => isset($data['training']) ? $data['training']->hitch_recommendation_title : ''
                                        ])

                                        @include('admin._textarea_block',[
                                            'label' => trans('content.hitch_recommendation_description'),
                                            'name' => 'hitch_recommendation_description',
                                            'value' => isset($data['training']) ? $data['training']->hitch_recommendation_description : '',
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
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.training_days') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['training']->days))
                    @include('admin._modal_delete_block',['modalId' => 'delete-day-modal', 'function' => 'delete-day', 'head' => trans('content.confirm_delete_day')])
                    <table class="table datatable-basic table-items">
                        <tr>
                            <th class="id">{{ trans('content.day') }}</th>
                            <th class="text-left">{{ trans('content.emphasis') }}</th>
                            <th class="text-center">{{ trans('content.video_count') }}</th>
                            <th class="text-center">{{ trans('content.created_at') }}</th>
                            <th class="text-center">{{ trans('content.updated_at') }}</th>
                            <th class="text-center">{{ trans('content.delete') }}</th>
                        </tr>
                        @foreach ($data['training']->days as $k => $day)
                            <tr role="row" id="{{ 'day_'.$day->id }}">
                                <td class="id">{{ $k+1 }}</td>
                                <td class="text-left"><a href="/admin/day?id={{ $day->id }}">{{ $day->emphasis }}</a></td>
                                <td class="text-center"><b>{{ count($day->videos) }}</b></td>
                                <td class="text-center">{{ $day->created_at->format('d.m.Y') }}</td>
                                <td class="text-center">{{ $day->updated_at->format('d.m.Y') }}</td>
                                <td class="delete"><span del-data="{{ $day->id }}" modal-data="delete-day-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h2 class="text-center">{{ trans('content.no_content') }}</h2>
                @endif
            </div>
            <div class="panel-body">
                @include('admin._add_button_block',['href' => 'day/add?training_id='.$data['training']->id, 'text' => trans('content.add_day')])
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
                <h4 class="panel-title">{{ trans('content.training_photos') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['training']->photos))
                    @include('admin._modal_delete_block',['modalId' => 'delete-photo-modal', 'function' => 'delete-photo', 'head' => trans('content.confirm_delete_photo')])
                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/photos') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data['training']->id }}">
                        @foreach ($data['training']->photos as $photo)
                            @include('admin._photo_container_block',['photo' => $photo])
                        @endforeach
                        @include('admin._photo_container_block',['photo' => null])
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('admin._save_button_block')
                        </div>
                    </form>
                @else
                    <h2 class="text-center">{{ trans('content.no_content') }}</h2>
                @endif
            </div>
        </div>
    @endif
@endsection