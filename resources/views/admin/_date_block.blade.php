<div class="{{ isset($addClass) ? $addClass : '' }} form-group has-feedback {{ $errors && $errors->has($name) ? 'has-error' : '' }}">
    <label class="control-label col-md-12 text-semibold">{{ $label }}</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
        <input type="text" name="{{ $name }}" class="form-control daterange-single" value="{{ !count($errors) ? date('d.m.Y', $value) : old($name) }}">
    </div>

    @if ($errors && $errors->has($name))
        <div class="form-control-feedback">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block">{{ $errors->first($name) }}</span>
    @endif
</div>