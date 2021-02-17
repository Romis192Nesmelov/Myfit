@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ trans('content.feed_by',['date' => $data['feed']->updated_at->format('d.m.Y')]) }}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('/admin/feed') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $data['feed']->id }}">
                @include('admin._user_creds_block',[
                    'title' => trans('content.user_why_created_request'),
                    'user' => $data['feed']->user
                ])
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                            @include('admin._textarea_block',[
                                'label' => trans('content.recipe'),
                                'name' => 'recipe',
                                'value' => $data['feed']->recipe,
                                'simple' => true
                            ])

                            @include('admin._textarea_block',[
                                'label' => trans('content.comment'),
                                'name' => 'comment',
                                'value' => $data['feed']->comment,
                                'simple' => true
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'paid',
                                'label' => trans('content.paid'),
                                'checked' => $data['feed']->paid
                            ])

                            @include('admin._save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection