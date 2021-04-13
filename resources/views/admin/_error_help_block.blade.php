@if (count($errors) && $errors->has($name))
    <div class="help-block">{{ $errors->first($name) }}</div>
@endif