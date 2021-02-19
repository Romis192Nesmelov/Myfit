@if ($user && $user->avatar)
    <a class="img-preview image" href="{{ asset($user->avatar) }}"><img src="{{ asset($user->avatar) }}" /></a>
@else
    <div class="avatar-icon"><i class="icon-user"></i></div>
@endif