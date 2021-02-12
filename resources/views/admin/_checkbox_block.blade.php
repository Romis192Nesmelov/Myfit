<div class="{{ isset($addClass) ? $addClass : '' }} col-md-{{ isset($col) && $col ? $col : '12' }}">
    <label class="checkbox-inline">
        <input type="checkbox" name="{{ $name }}" class="styled" {{ isset($checked) && $checked ? 'checked=checked' : '' }}>{{ $label }}
    </label>
</div>