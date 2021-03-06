<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\User;
use App\Payment;

trait HelperTrait
{
    public $data = [];
    public $validationUser = 'required|integer|exists:users,id';
    public $validationPassword = 'required|confirmed|min:3|max:50';
    public $validationProgram = 'required|integer|exists:programs,id';
    public $validationTraining = 'required|integer|exists:trainings,id';
    
    public function randString()
    {
        return md5(rand(0,100000));
    }
    
    public function setNumeralPeriodicity($value)
    {
        return view('_case_numeral_periodicity_block',['value' => $value])->render();
    }

    public function checkAuth(User $user)
    {
        return $user->access_token && $user->access_token_expired > time();
    }

    public function createAccessToken(User $user)
    {
        $token = $this->getRandToken();
        $expired = time() + (60 * 60 * 3);
        $user->access_token = $token;
        $user->access_token_expired = $expired;
        $user->save();
        return [$token, $expired];
    }
    
    public function getRandToken()
    {
        return md5(time().Str::random(40));
    }
    
    public function checkTrainings()
    {
        $paidTrainings = Payment::where('active',1)->get();
        foreach ($paidTrainings as $paid) {
            $checkDate = Carbon::today()->subDays($paid->training->duration);
            $paidDate = $paid->created_at->today();
            if ($checkDate > $paidDate) {
                $paid->active = 0;
                $paid->save();
            }
        }
    }
    
    public function getLocations($location=null)
    {
        $locations = [
            'Азербайджан',
            'Армения',
            'Беларусь',
            'Казахстан',
            'Кыргызстан',
            'Молдова',
            'Россия',
            'Таджикистан',
            'Туркменистан',
            'Узбекистан',
            'Украина',

            'Албания',
            'Андорра',
            'Босния и Герцеговина',
            'Ватикан',
            'Греция',
            'Грузия',
            'Дания',
            'Исландия',
            'Исландия',
            'Испания',
            'Италия',
            'Кипр',
            'Латвия',
            'Литва',
            'Мальта',
            'Норвегия',
            'Польша',
            'Португалия',
            'Румыния',
            'Сан-Марино',
            'Северная Македония',
            'Сербия',
            'Словакия',
            'Словения',
            'Турция',
            'Финляндия',
            'Хорватия',
            'Черногория',
            'Чехия',
            'Швеция',
            'Эстония',

            'ДНР',
            'ЛНР',
            'Косово',
            'Приднестровье',

            'Австралия',
            'Бангладеш',
            'Вьетнам',
            'Индия',
            'Индонезия',
            'Камбоджа',
            'Китай',
            'Малайзия',
            'Монголия',
            'Мьянма',
            'Непал',
            'Новая Зеландия',
            'Пакистан',
            'Палау',
            'Республика Корея',
            'Сингапур',
            'Таиланд',
            'Фиджи',
            'Филиппины',
            'Шри-Ланка',
            'Япония',

            'Антигуа и Барбуда',
            'Багамские Острова',
            'Барбадос',
            'Белиз',
            'Гаити',
            'Гватемала',
            'Гондурас',
            'Гренада',
            'Доминика',
            'Доминиканская Республика',
            'Канада',
            'Коста-Рика',
            'Куба',
            'Мексика',
            'Никарагуа',
            'Панама',
            'Сальвадор',
            'Сент-Винсент и Гренадины',
            'Сент-Китс и Невис',
            'Сент-Люсия',
            'США',
            'Тринидад и Тобаго',
            'Ямайка',

            'Аргентина',
            'Боливия',
            'Бразилия',
            'Венесуэла',
            'Гайана',
            'Колумбия',
            'Парагвай',
            'Перу',
            'Суринам',
            'Уругвай',
            'Чили',
            'Эквадор'
        ];
        
        if ($location && !in_array($location,$locations)) $locations[] = $location;
        return $locations;
    }

    public function getBirthdayYears()
    {
        $years = [];
        for ($i=1900;$i<=((int)date('Y'))-10;$i++) {
            $years[] = $i;
        }
        return $years;
    }
    
    public function processingFields(Request $request, $checkboxFields=null, $ignoreFields=null, $timeFields=null, $colorFields=null)
    {

        $exceptFields = ['_token','id','password_confirmation'];
        if ($ignoreFields) {
            if (is_array($ignoreFields)) $exceptFields = array_merge($exceptFields, $ignoreFields);
            else $exceptFields[] = $ignoreFields;
        }

//        $exceptFields = array_merge($exceptFields, $this->ignoringFields);
        $fields = $request->except($exceptFields);

        if ($checkboxFields) {
            if (is_array($checkboxFields)) {
                foreach ($checkboxFields as $field) {
                    $fields[$field] = isset($fields[$field]) && $fields[$field] == 'on' ? 1 : 0;
                }
            } else {
                $fields[$checkboxFields] = isset($fields[$checkboxFields]) && $fields[$checkboxFields] == 'on' ? 1 : 0;
            }
        }

        if ($timeFields) {
            if (is_array($timeFields)) {
                foreach ($timeFields as $field) {
                    $fields[$field] = Carbon::createFromTimestamp(strtotime($this->convertTime($fields[$field])))->toDateTimeString();
//                    $fields[$field] = strtotime($this->convertTime($fields[$field]));
                }
            } else {
                $fields[$timeFields] = Carbon::createFromTimestamp(strtotime($this->convertTime($fields[$timeFields])))->toDateTimeString();
//                $fields[$timeFields] = strtotime($this->convertTime($fields[$timeFields]));
            }
        }

        if ($colorFields) {
            if (is_array($colorFields)) {
                foreach ($colorFields as $field) {
                    $fields[$field] = $this->convertColor($fields[$field]);
                }
            } else {
                $fields[$colorFields] = $this->convertColor($fields[$colorFields]);
            }
        }
        return $fields;
    }

    public function processingImage(Request $request, Model $model=null, $field=null, $name=null, $path=null)
    {
        $imageField = [];
        $field = $field ? $field : 'image';
        
        if ($request->hasFile($field)) {
            $this->unlinkFile($model, $field);

            $info = $model && $model[$field] ? pathinfo($model[$field]) : null;
            
            if ($name) $imageName = $name.'.'.$request->file($field)->getClientOriginalExtension();
            elseif ($info) $imageName = $info['filename'].'.'.$request->file($field)->getClientOriginalExtension();
            else $imageName = $this->randString().'.'.$request->file($field)->getClientOriginalExtension();
            
            if (!$path && $info) $path = $info ? $info['dirname'] : 'images';

            $request->file($field)->move(base_path('public/'.$path),$imageName);
            $imageField[$field] = $path.'/'.$imageName;
        }
        return $imageField;
    }

    public function unlinkFile($table, $file, $path='')
    {
        $fullPath = base_path('public/'.$path.$table[$file]);
        if (isset($table[$file]) && $table[$file] && file_exists($fullPath)) unlink($fullPath);
    }

    public function messageMailer(array $fields)
    {
        $users = User::where('active',1)->where('admin',1)->where('receive_messages',1)->get();
        foreach ($users as $user) {
            if ($user->email) $this->sendMail($user->email, 'message', $fields);
        }
    }

    public function sendMail($destination, $template, array $fields, $copyTo=null, $pathToFile=null)
    {
        $title = Config::get('app.name');
        Mail::send('emails.'.$template, $fields, function($message) use ($title, $pathToFile, $destination, $copyTo) {
            $message->subject(trans('auth.message_from').$title);
            $message->from(Config::get('app.mail_from'), $title);
            $message->to($destination);
            if ($copyTo) $message->cc($copyTo);
            if ($pathToFile) $message->attach($pathToFile);
        });
    }

    private function convertTime($time)
    {
        $time = explode('.', $time);
        return $time[1].'/'.$time[0].'/'.$time[2];
    }

    private function convertColor($color)
    {
        if (preg_match('/^(hsv\(\d+\, \d+\%\, \d+\%\))$/',$color)) {
            $hsv = explode(',',str_replace(['hsv','(',')','%',' '],'',$color));
            $color = $this->fGetRGB($hsv[0],$hsv[1],$hsv[2]);
        }
        return $color;
    }

    private function fGetRGB($iH, $iS, $iV)
    {
        if($iH < 0)   $iH = 0;   // Hue:
        if($iH > 360) $iH = 360; //   0-360
        if($iS < 0)   $iS = 0;   // Saturation:
        if($iS > 100) $iS = 100; //   0-100
        if($iV < 0)   $iV = 0;   // Lightness:
        if($iV > 100) $iV = 100; //   0-100
        $dS = $iS/100.0; // Saturation: 0.0-1.0
        $dV = $iV/100.0; // Lightness:  0.0-1.0
        $dC = $dV*$dS;   // Chroma:     0.0-1.0
        $dH = $iH/60.0;  // H-Prime:    0.0-6.0
        $dT = $dH;       // Temp variable
        while($dT >= 2.0) $dT -= 2.0; // php modulus does not work with float
        $dX = $dC*(1-abs($dT-1));     // as used in the Wikipedia link
        switch(floor($dH)) {
            case 0:
                $dR = $dC; $dG = $dX; $dB = 0.0; break;
            case 1:
                $dR = $dX; $dG = $dC; $dB = 0.0; break;
            case 2:
                $dR = 0.0; $dG = $dC; $dB = $dX; break;
            case 3:
                $dR = 0.0; $dG = $dX; $dB = $dC; break;
            case 4:
                $dR = $dX; $dG = 0.0; $dB = $dC; break;
            case 5:
                $dR = $dC; $dG = 0.0; $dB = $dX; break;
            default:
                $dR = 0.0; $dG = 0.0; $dB = 0.0; break;
        }
        $dM  = $dV - $dC;
        $dR += $dM; $dG += $dM; $dB += $dM;
        $dR *= 255; $dG *= 255; $dB *= 255;
        return 'rgb('.round($dR).', '.round($dG).', '.round($dB).')';
    }

    public function saveCompleteMessage()
    {
        Session::flash('message',trans('content.save_complete'));
    }

}