@extends('layouts.admin')

@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h4 class="panel-title">{{ isset($data['payment']) ? trans('content.payment_by',['date' => $data['payment']->created_at]) : trans('content.adding_payment') }}</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" action="{{ url('/admin/payment') }}" method="post">
                {{ csrf_field() }}
                @if (isset($data['payment']))
                    <input type="hidden" name="id" value="{{ $data['payment']->id }}">
                @endif

                <div class="user-block">
                    @include('admin._user_creds_block',[
                        'title' => trans('content.user_why_created_payment'),
                        'user' => isset($data['payment']) ? $data['payment']->user : null,
                        'users' => $data['users']
                    ])
                </div>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-flat">
                        <div class="panel-body payment">
                            <h5 class="text-left program">{!! trans('content.program').': <b><span class="text-green-800">'.(isset($data['payment']) ? $data['payment']->training->program->title : $programs[0]->title).'</span></b>' !!}</h5>
                            @include('admin._trainings_select_block',[
                                'selected' => isset($data['payment']) ? $data['payment']->training->id : 1
                            ])

                            <h5 class="text-left training-price">{!! trans('content.training_price').': <span class="text-green-800">'.view('admin._money_format_block',['value' => (isset($data['payment']) ? $data['payment']->training->price : $programs[0]->trainings[0]->price)])->render().'</span>' !!}</h5>
                            @include('admin._input_block', [
                                'label' => trans('content.payment').' ₽',
                                'name' => 'value',
                                'type' => 'number',
                                'min' => 50,
                                'max' => isset($data['payment']) ? $data['payment']->training->price : $programs[0]->trainings[0]->price,
                                'placeholder' => trans('content.duration'),
                                'value' => isset($data['payment']) ? $data['payment']->value : 50
                            ])

                            @include('admin._checkbox_block',[
                                'name' => 'paid',
                                'label' => trans('content.payment_active'),
                                'checked' => isset($data['payment']) ? $data['payment']->active : 1
                            ])

                            @include('admin._save_button_block')
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection