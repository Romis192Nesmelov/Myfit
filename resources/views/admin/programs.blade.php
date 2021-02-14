@extends('layouts.admin')

@section('content')
    @include('admin._modal_delete_block',['modalId' => 'delete-modal', 'function' => 'delete-program', 'head' => trans('content.confirm_delete_program')])

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans('content.programs') }}</h3>
        </div>
        <div class="panel-body">
            <table class="table datatable-basic table-items">
                <tr>
                    <th class="text-center">{{ trans('content.photo') }}</th>
                    <th class="text-center">{{ trans('content.title') }}</th>
                    <th class="text-center">{{ trans('content.description') }}</th>
                    <th class="text-center">{{ trans('content.trainings_count') }}</th>
                    <th class="text-center">{{ trans('content.status') }}</th>
                    <th class="text-center">{{ trans('content.delete') }}</th>
                </tr>
                @foreach ($programs as $program)
                    <tr role="row" id="{{ 'program_'.$program->id }}">
                        <td class="text-center image"><a class="img-preview" href="{{ asset($program->photo) }}"><img src="{{ asset($program->photo) }}" /></a></td>
                        <td class="text-center head"><a href="/admin/programs?id={{ $program->id }}">{{ $program->title }}</a></td>
                        <td class="text-left">{{ $program->description }}</td>
                        <td class="text-left">{{ count($program->trainings) }}</td>
                        <td class="text-center">
                            @include('admin._status_block', [
                                'status' => $program->active,
                                'trueLabel' => trans('content.program_active'),
                                'falseLabel' => trans('content.program_not_active')
                            ])
                        </td>
                        <td class="delete"><span del-data="{{ $program->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="panel-body">
            @include('admin._add_button_block',['href' => 'programs/add', 'text' => trans('content.add_program')])
        </div>
    </div>
@endsection