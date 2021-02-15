@extends('layouts.admin')

@section('content')
    @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-training', 'head' => trans('content.confirm_delete_program')])

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('content.trainings') }}</h3>
        </div>
        <div class="panel-body">
            @foreach ($programs as $program)
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $program->title }}</h3>
                    </div>
                    <div class="panel-body">
                        @include('admin._trainings_table_block',['trainings' => $program->trainings])
                    </div>
                    <div class="panel-body">
                        @include('admin._add_button_block',['href' => 'trainings/add?program_id='.$program->id, 'text' => trans('content.add_training')])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection