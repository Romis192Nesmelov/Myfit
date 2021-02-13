<div class="{{ isset($addClass) ? $addClass : '' }} form-group has-feedback {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    @if (isset($label) && $label)
        <label class="control-label text-semibold">{{ $label }}</label>
    @endif
    <table class="range-input">
        <tr>
            <td class="value">
                <input min="{{ $min }}" max="{{ $max }}" class="form-control" type="number" value="{{ isset($value) && !count($errors) ? $value : old($name) }}">
            </td>
            <td class="hidden-xs hidden-sm"><input class="form-control pull-left" min="{{ $min }}" max="{{ $max }}" name="{{ $name }}" type="range" value="{{ isset($value) && !count($errors) ? $value : old($name) }}"></td>
        </tr>
    </table>

    @if ($errors && $errors->has($name))
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>