@php ob_start(); @endphp
<input class="form-control file-styled" type="file" name="{{ $name }}">
@include('admin._inputs_cover_block',['content' => ob_get_clean()])