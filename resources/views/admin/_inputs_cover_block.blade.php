<div class="form-group has-feedback has-feedback-left {{ isset($icon) && $icon ? 'has-icon' : '' }} {{ isset($addClass) ? $addClass : '' }} {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    @include('admin._label_block')
    @include('admin._error_icon_block')
    {!! $content !!}
    @include('admin._error_help_block')
</div>