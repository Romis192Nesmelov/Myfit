<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title text-center">{{ $title }}</h5>
        </div>
        <div class="panel-body">
            <div class="image avatar">@include('admin._user_avatar_block',['user' => $user])</div>
            <h6 class="text-center">
                <div class="user-name">{{ $user ? $user->name : '' }}</div>
                <div class="user-email">
                    @if ($user && $user->email)
                        @include('admin._email_href_block',['email' => $user->email])
                    @endif
                </div>
            </h6>
            @if (isset($users) && $users)
                @include('admin._select_block',[
                    'name' => 'user_id',
                    'values' => $users,
                    'selected' => $user ? $user->id : 1
                ])
            @endif
        </div>
    </div>
</div>