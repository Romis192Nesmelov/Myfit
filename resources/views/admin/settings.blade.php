@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.settings') }}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('/admin/settings') }}" method="post">
                {{ csrf_field() }}
                <div class="panel panel-flat">
                    <div class="panel-body">
                        @foreach($data['settings'] as $setting)
                            @include('admin._range_block', [
                                'label' => trans('content.'.$setting->name),
                                'name' => $setting->name,
                                'min' => 100,
                                'max' => 10000,
                                'value' => $setting->value,
                            ])
                        @endforeach
                    </div>
                </div>
                @include('admin._save_button_block')
            </form>
        </div>
    </div>
@endsection