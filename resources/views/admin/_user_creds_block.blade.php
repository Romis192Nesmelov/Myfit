<div class="image avatar">@include('admin._user_avatar_block',['user' => $user])</div>
<h6 class="text-center">
    <b>{{ $user->name }}</b><br>
    @if ($user->email)
        @include('admin._email_href_block',['email' => $user->email])
    @endif
</h6>