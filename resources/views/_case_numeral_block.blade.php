@if (App::getLocale() == 'en')
    {{ $value.' '.$englishCase.($value > 1 && $pluralForm ? 's' : '') }}
@else
    @php
    $number = (int)substr($value,-1);
    if ($value > 10 && $value < 20) {
        $numeral = $numeral1;
    } else {
        if ($number == 1) $numeral = $numeral2;
        elseif ($number > 1 && $number < 5) $numeral = $numeral3;
        else $numeral = $numeral1;
    }
    @endphp
    {{ $value.' '.$numeral }}
@endif