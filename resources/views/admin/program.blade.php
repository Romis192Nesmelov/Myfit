@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{!! isset($data['program']) ? trans('content.editing_program').' <b>'.$data['program']->title.'</b>' : trans('content.adding_program') !!}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/program') }}" method="post">
                {{ csrf_field() }}
                @if (isset($data['program']))
                    <input type="hidden" name="id" value="{{ $data['program']->id }}">
                @endif

                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('admin._image_block', [
                        'head' => trans('content.photo'),
                        'preview' => isset($data['program']) ? $data['program']->photo : null,
                        'full' => isset($data['program']) ? $data['program']->photo : null,
                        'name' => 'photo'
                    ])
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._checkbox_block',[
                                'name' => 'active',
                                'label' => trans('content.program_active'),
                                'checked' => isset($data['program']) ? $data['program']->active : 1
                            ])
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._input_block', [
                                'label' => trans('content.title'),
                                'name' => 'title',
                                'type' => 'text',
                                'max' => 255,
                                'placeholder' => trans('content.title'),
                                'value' => isset($data['program']) ? $data['program']->title : ''
                            ])

                            @include('admin._textarea_block',[
                                'label' => trans('content.description'),
                                'name' => 'description',
                                'value' => isset($data['program']) ? $data['program']->description : '',
                                'simple' => true
                            ])
                            @include('admin._button_block', ['type' => 'submit', 'icon' => ' icon-floppy-disk', 'text' => trans('content.save'), 'addClass' => 'pull-right'])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($data['program']))
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.trainings_of_program') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['program']->trainings))
                    @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-training', 'head' => trans('content.confirm_delete_program')])
                    @include('admin._trainings_table_block',['trainings' => $data['program']->trainings])
                    <div class="panel-body">
                        @include('admin._add_button_block',['href' => 'programs/add?program_id='.$data['program']->id, 'text' => trans('content.add_training')])
                    </div>
                @else
                    <h1 class="text-center">{{ trans('content.trainings_not_found') }}</h1>
                @endif
            </div>
        </div>
    @endif
@endsection