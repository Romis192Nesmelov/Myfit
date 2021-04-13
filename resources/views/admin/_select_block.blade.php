@php ob_start(); @endphp
<select class="form-control" name="{{ $name }}">
    @if (is_array($values))
        @foreach ($values as $value => $options)
            <option value="{{ $value }}" {{ (!count($errors) ? $value == $selected : $value == old($name)) ? 'selected' : '' }}>{{ $options }}</option>
        @endforeach
    @else
        @foreach ($values as $value)
            <option value="{{ $value->id }}" {{ (!count($errors) ? $value->id == $selected : $value->id == old($name)) ? 'selected' : '' }}>{{ isset($value->name) ? $value->name : $value->title }}</option>
        @endforeach
    @endif
</select>
@include('admin._inputs_cover_block',['content' => ob_get_clean()])