@extends('layouts.mail')

@section('content')
    @include('emails._head_block',['hLevel' => 1, 'head' => trans('auth.confirm_register_head')])
    @include('emails._p_block',['content' => trans('auth.confirm_register_part1')])
    @include('emails._p_block',['content' => trans('auth.confirm_register_part2')])

    <?php ob_start(); ?>
    @include('emails._button_block',['href' => 'myfit://confirm-registration/'.$token, 'buttonText' => trans('auth.complete_registration')])

    @include('emails._content_block', ['content' => ob_get_clean()])

    @include('emails._footer_message_block',['footerContent' => trans('auth.trouble_with_url_button', [
        'actionText' => trans('auth.complete_registration'),
        'actionURL' => url('/confirm-registration/'.$token)
    ])])
@endsection