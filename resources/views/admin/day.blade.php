
@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{!! isset($data['day']) ? trans('content.editing_day',['program' => $data['day']->training->program->title, 'training' => $data['day']->training->duration.' '.trans('content.weeks').'/'.$data['day']->training->periodicity]) : trans('content.adding_day') !!}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('/admin/day') }}" method="post">
                {{ csrf_field() }}
                @if (isset($data['day']))
                    <input type="hidden" name="id" value="{{ $data['day']->id }}">
                @endif
                <div class="form-group has-feedback {{ $errors && $errors->has('training_id') ? 'has-error' : '' }}">
                    <label class="control-label col-md-12 text-semibold">{{ trans('content.training') }}</label>
                    <select name="training_id" class="form-control">
                        @foreach ($programs as $program)
                            <optgroup label="{{ $program->title }}">
                                @foreach ($program->trainings as $training)
                                    <option value="{{ $training->id }}" {{ (!count($errors) ? $training->id == (isset($data['day']) ? $data['day']->training->id : Request::input('trainig_id')) : $training->id == old('training_id')) ? 'selected' : '' }}>{{ $training->duration.' '.trans('content.weeks').'/'.$training->periodicity }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @if ($errors && $errors->has('training_id'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        <span class="help-block">{{ $errors->first('training_id') }}</span>
                    @endif
                </div>
                @include('admin._input_block', [
                    'label' => trans('content.emphasis'),
                    'name' => 'emphasis',
                    'type' => 'text',
                    'placeholder' => trans('content.emphasis'),
                    'value' => isset($data['day']) ? $data['day']->emphasis : ''
                ])
                @include('admin._save_button_block')
            </form>
        </div>
    </div>
    @if (isset($data['day']))
        @include('admin._modal_delete_block',['modalId' => 'delete-video-modal', 'function' => 'delete-video', 'head' => trans('content.confirm_delete_video')])
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h4 class="panel-title">{{ trans('content.video') }}</h4>
            </div>
            <div class="panel-body">
                @if (count($data['day']->photos))
                    <form class="form-horizontal" action="{{ url('/admin/videos') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data['day']->id }}">
                        @foreach($data['day']->videos as $video)
                            @include('admin._video_container_block',['id' => $video->id, 'videoHref' => $video->video])
                        @endforeach
                        @include('admin._video_container_block',['name' => 'video_add'])
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