@extends('layouts.static')
@section('content')
    <div class="flex-center">
        <div class="content">
            <form method="post" action="/api/upload-avatar/e85b7f3bf673aa3336db3e9f9cd3030e" enctype="multipart/form-data">
                <input name="avatar" type="file">
                <button type="submit">Ok</button>
            </form>
        </div>
    </div>
@endsection