@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.photos') }}</h4>
        </div>
        <div class="panel-body">
            @if (count($data['photos']))
                @include('admin._modal_delete_block',['modalId' => 'delete-photo-modal', 'function' => 'delete-photo', 'head' => trans('content.confirm_delete_photo')])
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/admin/photos') }}" method="post">
                    {{ csrf_field() }}
                    @foreach ($data['photos'] as $photo)
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
@endsection