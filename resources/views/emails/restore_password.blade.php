@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 1, 'head' => trans('auth.restore_password_head')])
    @include('emails._p_block',['content' => trans('auth.restore_password_part1')])
    @include('emails._p_block',['content' => trans('auth.restore_password_part2')])

    <?php ob_start(); ?>
    @include('emails._button_block',['href' => url('/confirm-registration/'.$token), 'buttonText' => trans('auth.restore_password')])

    @include('emails._content_block', ['content' => ob_get_clean()])

    @include('emails._footer_message_block',['footerContent' => trans('auth.trouble_with_url_button2', [
        'actionText' => trans('auth.restore_password'),
        'actionURL' => url('/confirm-registration/'.$token)
    ])])
@endsection