<div class="{{ isset($addClass) ? $addClass : '' }} form-group has-feedback {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    @if (isset($label))
        <label class="control-label col-md-12 text-semibold">{{ $label }}</label>
    @endif
    <select name="{{ $name }}" class="form-control">
        @foreach ($groups as $group => $items)
            <optgroup label="{{ $group }}">
                @foreach ($items as $value => $options)
                    <option value="{{ $value }}" {{ (!count($errors) ? $value == $selected : $value == old($name)) ? 'selected' : '' }}>{{ $options }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>

    @if ($errors && $errors->has($name))
        <div class="form-control-feedback">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>