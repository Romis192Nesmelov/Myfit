<div class="panel panel-flat">
    @if (isset($head) && $head)
        <div class="panel-heading">
            <div class="panel-title">{{ $head }}</div>
        </div>
    @endif
    <div class="panel-body edit-image-preview">
        @if (isset($preview) && $preview)
            @if (isset($full) && $full)
                <a class="img-preview" href="{{ asset($full) }}">
            @endif
                <img src="{{ asset($preview) }}?{{ md5(rand(1,100000)*time()) }}" />
            @if (isset($preview) && $preview)
                </a>
            @endif
        @else
            <img src="{{ asset('images/placeholder.jpg') }}" />
        @endif
        @include('admin._input_file_block', ['label' => '', 'name' =>  isset($name) && $name ? $name : 'image'])
    </div>
</div>