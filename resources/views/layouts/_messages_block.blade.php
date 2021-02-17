<div class="dropdown-content-heading">
    @if (count($messages))
        <a id="seen-all" href="#">{{ trans('content.make_all_as_read') }}</a>
    @endif
</div>
<ul class="media-list dropdown-content-body">
    @foreach ($messages as $message)
        <li class="media" id="message{{ $message->id }}">
            @php
                if ($message->feed) {
                    $url = 'feed?id='.$message->feed->id;
                    $head = trans('messages.new_feed_head');
                    $text = trans('messages.new_request_text',[
                        'user' => view('admin._user_href_block',['user' => $message->feed->user])->render(),
                        'date' => $message->feed->created_at->format('d.n.Y'),
                        'status' => $message->feed->paid ? trans('content.payed') : trans('content.not_payed')
                    ]);
                } elseif ($message->videoAdvice) {
                    $url = 'video-advice?id='.$message->videoAdvice->id;
                    $head = trans('messages.new_video_advice_head');
                    $text = trans('messages.new_request_text',[
                        'user' => view('admin._user_href_block',['user' => $message->videoAdvice->user])->render(),
                        'date' => $message->videoAdvice->created_at->format('d.m.Y'),
                        'status' => $message->videoAdvice->paid ? trans('content.payed') : trans('content.not_payed')
                    ]);
                } else {
                    $url = 'payments?id='.$message->payment->id;
                    $head = trans('messages.new_payment_head', ['value' => $message->payment->value]);
                    $text = trans('messages.new_payment_text',[
                        'user' => view('admin._user_href_block',['user' => $message->payment->user])->render(),
                        'date' => $message->payment->created_at->format('d.m.Y'),
                        'value' => $message->payment->value
                    ]);
                }
            @endphp
            <a href="{{ url('/admin/'.$url) }}" class="media-heading">
                <table>
                    <tr>
                        <span class="text-semibold">{{ $head }}</span>
                        <span class="media-annotation pull-right">{{ $message->created_at->format('d.m.Y') }}</span>
                    </tr>
                </table>
            </a>
            <span class="text-muted">{!! $text !!}</span>
        </li>
    @endforeach
</ul>

<div class="dropdown-content-footer">
    <a href="{{ url('/admin/messages') }}" data-popup="tooltip" title="{{ trans('content.all_messages') }}"><i class="icon-menu display-block"></i></a>
</div>