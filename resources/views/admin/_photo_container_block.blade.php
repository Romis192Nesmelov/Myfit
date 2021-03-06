<div class="col-md-3 col-sm-4 col-xs-12" {{ $photo ? 'id=photo_'.$photo->id : '' }}>
    <div class="panel panel-flat">
        <div class="panel-body">
            @if ($photo)
                <div class="icon-delete"><span del-data="{{ $photo->id }}" modal-data="delete-photo-modal" class="glyphicon glyphicon-remove-circle"></span></div>
            @endif
            @include('admin._image_block', [
                'head' => trans('content.photo'),
                'preview' => $photo ? $photo->photo : null,
                'full' => $photo ? $photo->photo : null,
                'name' => $photo ? 'photo_id'.$photo->id : 'photo_add'
            ])
            @include('admin._radio_button_block', [
                'name' => $photo ? 'type_id'.$photo->id : 'type_add',
                'values' => [
                    ['val' => 1, 'descript' => trans('content.warmup')],
                    ['val' => 2, 'descript' => trans('content.hitch')]
                ],
                'activeValue' => $photo ? $photo->type : 1
            ])
        </div>
    </div>
</div>