<div class="{{ isset($addClass) ? $addClass : '' }} form-group has-feedback-left {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    {{--<div class="form-control-feedback">--}}
        {{--<i class="icon-search4 text-size-base"></i>--}}
    {{--</div>--}}
    @if (isset($label))
        <label class="control-label col-md-12 text-semibold">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" class="form-control ac-combo">
        @if (isset($useNull) && $useNull)
            <option value="" {{ (!count($errors) ? !$selected : !old($name)) ? 'selected' : '' }}>{{ trans('content.no') }}</option>
        @endif
        @foreach ($items as $value)
            <option value="{{ $value }}" {{ (!count($errors) ? $value == $selected : $value == old($name)) ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>

    @if ($errors && $errors->has($name))
        <div class="form-control-feedback">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>