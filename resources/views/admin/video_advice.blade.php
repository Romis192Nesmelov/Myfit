@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.video_advice_by',['date' => $data['advice']->updated_at]) }}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('/admin/video-advice') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data['advice']->id }}">
                @include('admin._user_creds_block',[
                    'title' => trans('content.user_why_created_request'),
                    'user' => $user
                ])
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._input_block', [
                                'label' => trans('content.duration').'('.trans('content.minutes').')',
                                'name' => 'duration',
                                'type' => 'number',
                                'max' => 500,
                                'placeholder' => trans('content.duration'),
                                'value' => $data['advice']->duration
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'paid',
                                'label' => trans('content.paid'),
                                'checked' => $data['advice']->paid
                            ])

                            @include('admin._save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection