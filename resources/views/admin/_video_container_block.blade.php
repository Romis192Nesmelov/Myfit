<div class="col-md-4 col-sm-6 col-xs-12" {{ isset($id) ? 'id=video_'.$id : '' }}>
    <div class="panel panel-flat">
        <div class="panel-body">
            @if (isset($id))
                <div class="icon-delete"><span del-data="{{ $id }}" modal-data="delete-video-modal" class="glyphicon glyphicon-remove-circle"></span></div>
            @endif
            <div class="video-container">
                @if (!isset($id))
                    <img src="{{ asset('images/placeholder.jpg') }}" />
                @else
                    <iframe src="{{ $videoHref }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
            </div>
            @include('admin._input_block', [
                'label' => isset($id) ? trans('content.video_href') : trans('content.add_video'),
                'name' => isset($id) ? 'video_id'.$id : 'video_add',
                'type' => 'text',
                'placeholder' => trans('content.video_href'),
                'value' => $videoHref
            ])
        </div>
    </div>
</div>