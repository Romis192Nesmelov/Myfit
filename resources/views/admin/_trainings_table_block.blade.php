<table class="table datatable-basic table-items">
    <tr>
        <th class="text-center">{{ trans('content.duration') }}</th>
        <th class="text-center">{{ trans('content.periodicity') }}</th>
        <th class="text-center">{{ trans('content.complexity') }}</th>
        <th class="text-center">{{ trans('content.price') }}</th>
        <th class="text-center">{{ trans('content.status') }}</th>
        <th class="text-center">{{ trans('content.delete') }}</th>
    </tr>
    @foreach ($trainings as $training)
        <tr role="row" id="{{ 'training_'.$training->id }}">
            <td class="text-center head"><a href="/admin/trainings?id={{ $training->id }}">{{ $training->name }}</a></td>
            <td class="text-center head">{{ view('_case_numeral_periodicity_block',['value' => $training->periodicity]) }}</td>
            <td class="text-center">
                @include('admin._extended_status_block',[
                    'descriptions' => [
                        trans('content.very_low'),
                        trans('content.low'),
                        trans('content.low_medium'),
                        trans('content.medium'),
                        trans('content.high_medium'),
                        trans('content.high')
                    ],
                    'status' => $training->complexity
                ])
            </td>
            <td class="text-center">@include('admin._money_format_block',['value' => $training->price])</td>
            <td class="text-center">
                @include('admin._status_block', [
                    'status' => $training->active,
                    'trueLabel' => trans('content.training_active'),
                    'falseLabel' => trans('content.training_not_active')
                ])
            </td>
            <td class="delete"><span del-data="{{ $training->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span></td>
        </tr>
    @endforeach
</table>