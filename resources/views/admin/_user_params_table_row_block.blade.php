<tr role="row" {{ $param ? 'id=param_'.$param->id : '' }}>
    <td class="text-center">
        @include('admin._input_block', [
            'name' => $param ? 'param'.$param->id.'_height' : 'param_add_height',
            'type' => 'number',
            'max' => 300,
            'placeholder' => trans('content.height'),
            'value' => $param ? $param->height : 0
        ])
    </td>
    <td class="text-center">
        @include('admin._input_block', [
            'name' => $param ? 'param'.$param->id.'_weight' : 'param_add_weight',
            'type' => 'number',
            'max' => 300,
            'placeholder' => trans('content.weight'),
            'value' => $param ? $param->weight : 0
        ])
    </td>
    <td class="text-center">
        @include('admin._input_block', [
            'name' => $param ? 'param'.$param->id.'_waist_girth' : 'param_add_waist_girth',
            'type' => 'number',
            'max' => 300,
            'placeholder' => trans('content.waist_girth'),
            'value' => $param ? $param->waist_girth : 0
        ])
    </td>
    <td class="text-center">
        @include('admin._input_block', [
            'name' => $param ? 'param'.$param->id.'_hip_girth' : 'param_add_hip_girth',
            'type' => 'number',
            'max' => 300,
            'placeholder' => trans('content.hip_girth'),
            'value' => $param ? $param->hip_girth : 0
        ])
    </td>
    <td class="text-center">{{ $param ? $param->created_at : '' }}</td>
    <td class="delete">
        @if ($param)
            <span del-data="{{ $param->id }}" modal-data="delete-modal" class="glyphicon glyphicon-remove-circle"></span>
        @endif
    </td>
</tr>