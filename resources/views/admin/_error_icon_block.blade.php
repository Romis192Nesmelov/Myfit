@if (count($errors) && $errors->has($name))
    <div class="form-control-feedback">
        <i class="icon-cancel-circle2"></i>
    </div>
@elseif (isset($icon) && $icon)
    <div class="form-control-feedback">
        <i class="{{ $icon }}"></i>
    </div>
@endif