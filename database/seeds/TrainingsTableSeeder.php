<?php

use Illuminate\Database\Seeder;
use App\Training;
use App\TrainingGoal;
use App\TrainingVideo;

class TrainingsTableSeeder extends Seeder
{
    public function run()
    {
        $dataTrainings = [
            // Program#1
            // #1 id:1
            [
                'name' => 'Функциональная тренировка №1',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '1-2 круга (нагрузку увеличивать постепенно).',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба',
                'main_cardio_description' => '1-2 раза в неделю по 20-30 минут. Режим - равномерный. ЧП 70-75% от максима.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 1
            ],
            // #2 id:2
            [
                'name' => 'Функциональная тренировка №2',
                'complexity' => 4,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '1-2 круга (нагрузку увеличивать постепенно). Акцент на приводящую группу мышц бёдер.',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба',
                'main_cardio_description' => '1-2 раза в неделю по 30-40 минут. Режим- равномерный. ЧП 70-75% от максима.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 1
            ],
            // #3 id:3
            [
                'name' => 'Функциональная тренировка №3',
                'complexity' => 5,
                'duration' => 8,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/гантели от 2 кг/скакалка',
                'need_previous_completed' => 1,

                'warmup_warning_title' => '4-6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба',
                'main_cardio_description' => '1 трениновка: 30-40 минут, режим работы равномерный; 2 тренировка: 20-30 минут, режим работы интервальный',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 5499,
                'active' => 1,
                'program_id' => 1
            ],
            // #4 id:4
            [
                'name' => 'Функциональная тренировка №4',
                'complexity' => 6,
                'duration' => 8,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/гантели от 2 кг/скакалка/резиновый эспандер',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '5-6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '1-3 круга (нагрузку увеличивать постепенно)',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба',
                'main_cardio_description' => '1 тренировка: 30-40 минут, режим работы равномерный; 2 тренировка: 30-40 минут, режим работы равномерный',

                'hitch_warning_title' => 'стрейч 4-6 упражнений',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 5499,
                'active' => 1,
                'program_id' => 1
            ],
            
            // Program#2
            // #1 id:5
            [
                'name' => 'Послеродовой период №1',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2',
                'equipment' => 'гимнастический коврик',
                'need_previous_completed' => 0,

                'warning_title' => 'С разрешения лечащего врача',
                'warning_description' => '4-6 недель после родов можно приступать к восстановительной гимнастике',
                'recommendation_title' => '',
                'recommendation_description' => '',

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Прогулки с коляской.',
                'main_cardio_description' => 'Темп медленный.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 2
            ],
            // #2 id:6
            [
                'name' => 'Послеродовой период №2',
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик',
                'need_previous_completed' => 0,

                'warning_title' => 'С разрешения лечащего врача',
                'warning_description' => '6-12 недель после родов',
                'recommendation_title' => '',
                'recommendation_description' => '',

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '13 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Прогулки с коляской.',
                'main_cardio_description' => ' Темп медленный.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 2
            ],
            // #3 id:7
            [
                'name' => 'Послеродовой период №3',
                'complexity' => 4,
                'duration' => 8,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/резиновый эспандер',
                'need_previous_completed' => 1,

                'warning_title' => 'С разрешения лечащего врача',
                'warning_description' => '12-20 недель после родов',
                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Переход к тренировкам высокого уровня, рекомендуется только после прохождения предыдущих программ',

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю.',
                'main_cardio_description' => ' Темп - средний.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 2
            ],
            // #4 id:8
            [
                'name' => 'Послеродовой период №4',
                'complexity' => 6,
                'duration' => 10,
                'periodicity' => '1-2',
                'equipment' => 'гимнастический коврик/гимнастический мяч/гантели 2 кг',
                'need_previous_completed' => 1,

                'warning_title' => 'С разрешения лечащего врача',
                'warning_description' => '30 и более недель после родов',
                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Переход к тренировкам высокого уровня, рекомендуется только после прохождения предыдущих программ',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю.',
                'main_cardio_description' => ' Темп - средний.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 4499,
                'active' => 1,
                'program_id' => 2
            ],
            
            // Program#3
            // #1 id:9
            [
                'name' => 'Общеукрепляющие программа',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик / fit ball',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю по 15-20 минут',
                'main_cardio_description' => 'Частота пульса 70-80% от максима',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            // #2 id:10
            [
                'name' => 'ССС и ДС',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/скакалка',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 2-3 раза в неделю по 15-20 минут.',
                'main_cardio_description' => 'Частота пульса 70-75% от максима.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            // #3 id:11
            [
                'name' => 'Верхний плечевой пояс',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/скакалка/гантели по1-2 кг',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 2 раза в неделю по 30 минут.',
                'main_cardio_description' => ' Частота пульса 75% от максима.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            
            // #4 id:12
            [
                'name' => 'Коленные суставы',
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю 15 минут.',
                'main_cardio_description' => 'Темп медленный.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            // #5 id:13
            [
                'name' => 'Поясничный отдел',
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю 15 минут.',
                'main_cardio_description' => 'Темп медленный.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            // #6 id:14
            [
                'name' => 'Укрепление мышц тазового дна',
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/резиновый эспандер (легкий)',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 2-3 раза в неделю по 20 минут.',
                'main_cardio_description' => 'Частота пульса 70-75% от максима.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            // #7 id:15
            [
                'name' => 'Голеностопный сустав',
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/гантели 2 кг',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '13 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 2 раза в неделю по 10-15 минут.',
                'main_cardio_description' => 'Темп очень медленный.',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 3
            ],
            
            // Program#4
            // #1 id:16
            [
                'name' => 'TRX №1',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'ленты TRX/гимнастический коврик/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю 30-40 минут.',
                'main_cardio_description' => ' Частота пульса 70-80 % от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 4
            ],
            // #2 id:17
            [
                'name' => 'TRX №2',
                'complexity' => 4,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'ленты TRX/гимнастический коврик/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '11 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю по 40 минут.',
                'main_cardio_description' => 'Частота пульса 70-80 % от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 4
            ],
            // #3 id:18
            [
                'name' => 'TRX №3',
                'complexity' => 5,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'ленты TRX/гимнастический коврик/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю 40-60 минут.',
                'main_cardio_description' => 'Частота пульса 70-80 % от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 4
            ],
            // #4 id:19
            [
                'name' => 'TRX №4',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'ленты TRX/гимнастический коврик/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю 30-40 минут.',
                'main_cardio_description' => ' Частота пульса 70-80 % от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 4
            ],

            // Program#5
            // #1 id:20
            [
                'name' => 'BOSU №1',
                'complexity' => 4,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/BOSU/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю. По 40-60 минут.',
                'main_cardio_description' => 'Частота пульса 75% от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 5
            ],
            // #2 id:21
            [
                'name' => 'BOSU №2',
                'complexity' => 5,
                'duration' => 6,
                'periodicity' => '2-3',
                'equipment' => 'гимнастический коврик/BOSU/скакалка',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '1-2 раза в неделю. По 40 минут.',
                'main_cardio_description' => 'Частота пульса 75-80% от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 5
            ],
            // #3 id:22
            [
                'name' => 'BOSU №3',
                'complexity' => 6,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/резиновый эспандер/гантели 3-4 кг/скакалка/BOSU',
                'need_previous_completed' => 0,

                'recommendation_title' => 'Рекомендация!',
                'recommendation_description' => 'Все упражнения делать одно за другим без отдыха.',

                'warmup_warning_title' => '6 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '10 упражнений (видео)',
                'main_warning_description' => '10-15 повторений / 2-3 круга. Нагрузку увеличивать постепенно',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '2 раза в неделю. По 60 минут.',
                'main_cardio_description' => 'Частота пульса 75-80% от максима.',

                'hitch_warning_title' => 'стрейч 4 упражнений (фото)',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 1,
                'its_cardio' => 0,
                'price' => 3499,
                'active' => 1,
                'program_id' => 5
            ],
            
            // Program#6
            // #1 id:23
            [
                'name' => 'Кардио №1',
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '2',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '',
                'main_warning_description' => '',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '',
                'main_cardio_description' => '',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 0,
                'its_cardio' => 1,
                'price' => 0,
                'active' => 1,
                'program_id' => 6
            ],
            // #2 id:24
            [
                'name' => 'Кардио №2',
                'complexity' => 4,
                'duration' => 6,
                'periodicity' => '2',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '',
                'main_warning_description' => '',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '',
                'main_cardio_description' => '',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 0,
                'its_cardio' => 1,
                'price' => 0,
                'active' => 1,
                'program_id' => 6
            ],
            // #3 id:25
            [
                'name' => 'Кардио №3',
                'complexity' => 5,
                'duration' => 6,
                'periodicity' => '2',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '',
                'main_warning_description' => '',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '',
                'main_cardio_description' => '',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 0,
                'its_cardio' => 1,
                'price' => 0,
                'active' => 1,
                'program_id' => 6
            ],
            // #4 id:26
            [
                'name' => 'Кардио №4',
                'complexity' => 6,
                'duration' => 6,
                'periodicity' => '2',
                'equipment' => '',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '',
                'main_warning_description' => '',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => '',
                'main_cardio_description' => '',

                'hitch_warning_title' => '',
                'hitch_warning_description' => '',
                'hitch_recommendation_title' => '',
                'hitch_recommendation_description' => '',

                'with_cardio' => 0,
                'its_cardio' => 1,
                'price' => 0,
                'active' => 1,
                'program_id' => 6
            ],
        ];

        $dataGoals = [
            //------------------------------------------------------------------- Функциональный тренировки
            // Функциональная тренировка №1
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 1],
            ['goal' => 'Развитие силовых показателей','training_id' => 1],
            ['goal' => 'Укрепление сердечно-сосудистой системы','training_id' => 1],
            ['goal' => 'Тренировка баланса и координации','training_id' => 1],

            // Функциональная тренировка №2
            ['goal' => 'Укрепление организма','training_id' => 2],
            ['goal' => 'Сброс лишнего веса','training_id' => 2],
            ['goal' => 'Развитие силовой выносливости','training_id' => 2],
            ['goal' => 'Проработка мышц рук и ног (Акцент на приводящую группу мышц бёдер)','training_id' => 2],
            ['goal' => 'Проработка мышц пресса и спины','training_id' => 2],

            // Функциональная тренировка №3
            ['goal' => 'Проработка мышечных групп','training_id' => 3],
            ['goal' => 'Сброс лишнего веса и коррекция фигуры','training_id' => 3],
            ['goal' => 'Укрепление связо-мышечного аппарата','training_id' => 3],

            // Функциональная тренировка №4
            ['goal' => 'Проработка всех мышечных групп ','training_id' => 4],
            ['goal' => 'Развитие силовой выносливости','training_id' => 4],
            ['goal' => 'Сброс лишнего веса','training_id' => 4],
            ['goal' => 'Развитие координации и баланс','training_id' => 4],

            //------------------------------------------------------------------- Послеродовые тренировки
            // Послеродовой период №1
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 5],
            ['goal' => 'Упражнения на баланс и координацию','training_id' => 5],

            // Послеродовой период №2
            ['goal' => 'Общее укрепление организма Коррекция фигуры','training_id' => 6],
            ['goal' => 'Коррекция фигуры','training_id' => 6],
            ['goal' => 'Укрепление мышц пресса и спины','training_id' => 6],

            // Послеродовой период №3
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 7],
            ['goal' => 'Укрепление мышц малого таза и внутренней стенки живота','training_id' => 7],
            ['goal' => 'Развитие гибкости','training_id' => 7],
            ['goal' => 'Развитие баланса и координации','training_id' => 7],

            // Послеродовой период №4
            ['goal' => 'Сброс лишнего веса','training_id' => 8],
            ['goal' => 'Коррекция фигуры, локальная проработка мышечных групп','training_id' => 8],

            //------------------------------------------------------------------- 50+
            // Общеукрепляющие программа
            ['goal' => 'Общеукрепляющая программа тренировок','training_id' => 9],

            ['goal' => 'Укрепление ССС и Дыхательной системы','training_id' => 10],
            ['goal' => 'Повышение общего тонуса организма','training_id' => 10],

            ['goal' => 'Укрепление мышц, суставов, связок верхнего плечевого пояса','training_id' => 11],
            ['goal' => 'Проработка шейно-воротниковой зоны','training_id' => 11],
            ['goal' => 'Общее укрепление организма','training_id' => 11],

            ['goal' => 'Укрепление и восстановление коленных суставов','training_id' => 12],
            
            ['goal' => 'Укрепление мышц и восстановление эластичности поясничного отдела позвоночника.','training_id' => 13],

            ['goal' => 'Укрепление мышц тазового дна, улучшение кровообращения','training_id' => 14],
            ['goal' => 'Общее укрепление организма','training_id' => 14],
            
            ['goal' => 'Укрепление мышц и связок голеностопного сустава, улучшение подвижности в нем','training_id' => 15],
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 15],
            
            //------------------------------------------------------------------- TRX
            // TRX №1
            ['goal' => 'Общефизическая подготовка','training_id' => 16],
            ['goal' => 'Укрепление мышц всего организма','training_id' => 16],
            ['goal' => 'Координация и баланс','training_id' => 16],
            ['goal' => 'Сброс лишнего веса','training_id' => 16],

            // TRX №2
            ['goal' => 'Функциональный режим работы','training_id' => 18],
            ['goal' => 'Развитие силовой выносливости','training_id' => 18],
            ['goal' => 'Проработка мышц всего организма','training_id' => 18],
            ['goal' => 'Сброс лишнего веса','training_id' => 18],
            ['goal' => 'Коррекция фигуры','training_id' => 18],

            // TRX №3
            ['goal' => 'Функциональный режим работы','training_id' => 19],
            ['goal' => 'Развитие мышц всего тела','training_id' => 19],
            ['goal' => 'Наращивание сухой мышечной массы','training_id' => 19],
            ['goal' => 'Развитие силовой выносливости','training_id' => 19],
            ['goal' => 'Баланс и гибкость','training_id' => 19],

            // TRX №4
            ['goal' => 'Функциональный режим работы','training_id' => 17],
            ['goal' => 'Развитие силовой выносливости','training_id' => 17],
            ['goal' => 'Проработка мышц всего организма','training_id' => 17],
            ['goal' => 'Повышение общей физической Подготовки; развитие баланса, гибкости.','training_id' => 17],

            //------------------------------------------------------------------- BOSU
            // BOSU №1
            ['goal' => 'Повышение физической подготовки','training_id' => 20],
            ['goal' => 'Укрепление организма в целом','training_id' => 20],
            ['goal' => 'Баланс и координация','training_id' => 20],
            ['goal' => 'Коррекция фигуры и сброс веса','training_id' => 20],

            // BOSU №2
            ['goal' => 'Развитие силовой выносливости','training_id' => 21],
            ['goal' => 'Баланс и координация','training_id' => 21],
            ['goal' => 'Сброс лишнего веса','training_id' => 21],
            ['goal' => 'Укрепление мышц и связок','training_id' => 21],

            // BOSU №3
            ['goal' => 'Повышение общей выносливости Укрепление организма в целом','training_id' => 22],
            ['goal' => 'Сброс лишнего веса','training_id' => 22],
            ['goal' => 'Развитие баланса и координации','training_id' => 22],

            //------------------------------------------------------------------- Кардио
            // Кардио №1
            ['goal' => 'Укрепление организма','training_id' => 23],
            ['goal' => 'Активное жиросжигание','training_id' => 23],

            // Кардио №2
            ['goal' => 'Укрепление организма','training_id' => 24],
            ['goal' => 'Активное жиросжигание','training_id' => 24],

            // Кардио №3
            ['goal' => 'Укрепление организма','training_id' => 25],
            ['goal' => 'Активное жиросжигание','training_id' => 25],

            // Кардио №4
            ['goal' => 'Укрепление организма','training_id' => 26],
            ['goal' => 'Активное жиросжигание','training_id' => 26]
        ];
        
        $dataVideos = [

            // Функциональные тренировки
            //------------------------------------------------------------------- Функциональный тренировки

            // Функциональная тренировка №1
            // Main FireFox myfit.robot@gmail.com
            ['video' => 'https://youtu.be/npIGLZQ3ubU','training_id' => 1],
            ['video' => 'https://youtu.be/TElU897ym3E','training_id' => 1],
            ['video' => 'https://youtu.be/BeeqBwdImuI','training_id' => 1],
            ['video' => 'https://youtu.be/9rFEIg7yaHE','training_id' => 1],
            ['video' => 'https://youtu.be/bM5VifhKidQ','training_id' => 1],
            ['video' => 'https://youtu.be/fAFMQvykmbo','training_id' => 1],
            ['video' => 'https://youtu.be/-icUxRw0kTk','training_id' => 1],
            ['video' => 'https://youtu.be/blGNNoGzzpQ','training_id' => 1],
            ['video' => 'https://youtu.be/bZjnWf60zZg','training_id' => 1],
            ['video' => 'https://youtu.be/a0SGZCrs2po','training_id' => 1],
            ['video' => 'https://youtu.be/yAHGL3b_iqM','training_id' => 1],

            // Функциональная тренировка №2
            // Main FireFox myfit.robot@gmail.com
            ['video' => 'https://youtu.be/s_umAv8Rv4Q','training_id' => 2],
            ['video' => 'https://youtu.be/GQfBU663bMk','training_id' => 2],
            ['video' => 'https://youtu.be/8H3jK0TSK0Y','training_id' => 2],
            ['video' => 'https://youtu.be/q6eEri6PXkw','training_id' => 2],
            ['video' => 'https://youtu.be/Nj5cd9g4_lQ','training_id' => 2],
            ['video' => 'https://youtu.be/JIqIyogTOUE','training_id' => 2],
            ['video' => 'https://youtu.be/MAmTmShHQds','training_id' => 2],
            ['video' => 'https://youtu.be/vF91oyV30Ss','training_id' => 2],
            ['video' => 'https://youtu.be/em_uGSqo1MM','training_id' => 2],
            ['video' => 'https://youtu.be/qCb0MBUwzkM','training_id' => 2],

            // Функциональная тренировка №3
            // Main FireFox myfit.robot@gmail.com
            ['video' => 'https://youtu.be/c7FKxhxXp7M','training_id' => 3],
            ['video' => 'https://youtu.be/RLgSolITwuQ','training_id' => 3],
            ['video' => 'https://youtu.be/Hr7hlx0euXA','training_id' => 3],
            ['video' => 'https://youtu.be/KmmgeGU2QDM','training_id' => 3],
            ['video' => 'https://youtu.be/YzGBqIyql98','training_id' => 3],
            ['video' => 'https://youtu.be/i0zKfpGHiIE','training_id' => 3],
            ['video' => 'https://youtu.be/EmAmAfTa1-I','training_id' => 3],
            ['video' => 'https://youtu.be/6pkPuyBWtQI','training_id' => 3],
            ['video' => 'https://youtu.be/xVs9NEPwcxc','training_id' => 3],

            // Функциональная тренировка №4
            // WorkUbuntu FireFox nesmelov.robot@gmail.com
            ['video' => 'https://youtu.be/1f-B_8-bvIA','training_id' => 4],
            ['video' => 'https://youtu.be/oxYHfd0MNTw','training_id' => 4],
            ['video' => 'https://youtu.be/_2zhw14A6Aw','training_id' => 4],
            ['video' => 'https://youtu.be/md-dPNGkrHU','training_id' => 4],
            ['video' => 'https://youtu.be/7MB5Txx4fRI','training_id' => 4],
            ['video' => 'https://youtu.be/UMCHOM49log','training_id' => 4],
            ['video' => 'https://youtu.be/_3n1qDaPriU','training_id' => 4],
            ['video' => 'https://youtu.be/4Byy6mB0XSA','training_id' => 4],
            ['video' => 'https://youtu.be/ic37PXKqHnE','training_id' => 4],
            ['video' => 'https://youtu.be/WgFG6y3ZyWc','training_id' => 4],

            //------------------------------------------------------------------- Послеродовые тренировки
            // Послеродовой период №1
            // Xrenovo FireFox mail.robot192@gmail.com
            ['video' => 'https://youtu.be/P7oxKXcgzKM','training_id' => 5],
            ['video' => 'https://youtu.be/tM-uLDruRI4','training_id' => 5],
            ['video' => 'https://youtu.be/9p0-PiiC0sc','training_id' => 5],
            ['video' => 'https://youtu.be/Kr4iwi3v9l4','training_id' => 5],
            ['video' => 'https://youtu.be/GNyZJkYd61o','training_id' => 5],
            ['video' => 'https://youtu.be/uBjzfdZUyVI','training_id' => 5],
            ['video' => 'https://youtu.be/z3RwdkoyJCo','training_id' => 5],
            ['video' => 'https://youtu.be/PkoktJoyG5Q','training_id' => 5],
            ['video' => 'https://youtu.be/FloCR9umaao','training_id' => 5],
            ['video' => 'https://youtu.be/jg7_E60jTeM','training_id' => 5],

            // Послеродовой период №2
            // Xrenovo FireFox mail.robot192@gmail.com
            ['video' => 'https://youtu.be/dz0yVRGK68w','training_id' => 6],
            ['video' => 'https://youtu.be/zZHyVINpAUQ','training_id' => 6],
            ['video' => 'https://youtu.be/Ds2SNmbtT0Q','training_id' => 6],
            ['video' => 'https://youtu.be/_iMYsmLurBs','training_id' => 6],
            ['video' => 'https://youtu.be/FvyjhkN8Row','training_id' => 6],
            ['video' => 'https://youtu.be/aOao4qwS2xg','training_id' => 6],
            ['video' => 'https://youtu.be/AJ6acCYWVcI','training_id' => 6],
            ['video' => 'https://youtu.be/QKi9UWBoN6Q','training_id' => 6],
            ['video' => 'https://youtu.be/Ea78-kXJ8pU','training_id' => 6],
            ['video' => 'https://youtu.be/iVorcAXjQHo','training_id' => 6],

            // Послеродовой период №3
            // Main Opera robot.stroter@gmail.com
            ['video' => 'https://youtu.be/05wn-qKB08s','training_id' => 7],
            ['video' => 'https://youtu.be/iXOY8Z18xZ4','training_id' => 7],
            ['video' => 'https://youtu.be/o-bUZ7jAVHY','training_id' => 7],
            ['video' => 'https://youtu.be/AVoPYqgorhM','training_id' => 7],
            ['video' => 'https://youtu.be/3uUjptfUqpA','training_id' => 7],
            ['video' => 'https://youtu.be/ypCRKanrznY','training_id' => 7],
            ['video' => 'https://youtu.be/EOa-i53pJwk','training_id' => 7],
            ['video' => 'https://youtu.be/DzvNqUxYgBI','training_id' => 7],
            ['video' => 'https://youtu.be/AmRe1U3Y-vE','training_id' => 7],
            ['video' => 'https://youtu.be/gLKouvNXxy0','training_id' => 7],
            ['video' => 'https://youtu.be/XMktHamptxE','training_id' => 7],

            // Послеродовой период №4
            // Main Opera robot.stroter@gmail.com
            ['video' => 'https://youtu.be/5j2VbJSC2wc','training_id' => 8],
            ['video' => 'https://youtu.be/XkXhvCaLPyU','training_id' => 8],
            ['video' => 'https://youtu.be/sL5MFOTQgLE','training_id' => 8],
            ['video' => 'https://youtu.be/c1nf2Nk0l9g','training_id' => 8],
            ['video' => 'https://youtu.be/gFuMInlhvbw','training_id' => 8],
            ['video' => 'https://youtu.be/6htkZg4Yp5Q','training_id' => 8],
            ['video' => 'https://youtu.be/kJcvCRo-hsA','training_id' => 8],
            ['video' => 'https://youtu.be/Yz-aTJC50gg','training_id' => 8],
            ['video' => 'https://youtu.be/bP2kRubXfbY','training_id' => 8],

            //------------------------------------------------------------------- 50+
            // Общеукрепляющие программа
            // Main FireFox myfit.robot@gmail.com
            ['video' => 'https://youtu.be/ZB2c8djKmGU','training_id' => 9],
            ['video' => 'https://youtu.be/ET75eNkiJmc','training_id' => 9],
            ['video' => 'https://youtu.be/AkLka-Ap0JQ','training_id' => 9],
            ['video' => 'https://youtu.be/-MBeFpyRVCs','training_id' => 9],
            ['video' => 'https://youtu.be/yq5Ds_-kPPQ','training_id' => 9],
            ['video' => 'https://youtu.be/y-wByQr4X6Q','training_id' => 9],
            ['video' => 'https://youtu.be/mK4BGl5h4o0','training_id' => 9],
            ['video' => 'https://youtu.be/-ZL022S7ftk','training_id' => 9],
            ['video' => 'https://youtu.be/hxz_d5K8xhA','training_id' => 9],
            ['video' => 'https://youtu.be/zHlTCD0sWTo','training_id' => 9],

            // ССС и ДС
            // Old FireFox nesmelov.and.company@gmail.com
            ['video' => 'https://youtu.be/5pMGx_UYXr0','training_id' => 10],
            ['video' => 'https://youtu.be/bvYXTnURGOM','training_id' => 10],
            ['video' => 'https://youtu.be/yFgFpsAlSDQ','training_id' => 10],
            ['video' => 'https://youtu.be/va-T1GO7fFs','training_id' => 10],
            ['video' => 'https://youtu.be/KBpy0mZrdMA','training_id' => 10],
            ['video' => 'https://youtu.be/f74_cXZdkZY','training_id' => 10],
            ['video' => 'https://youtu.be/onzcU7VpTgM','training_id' => 10],
            ['video' => 'https://youtu.be/hejF1jzzFrA','training_id' => 10],
            ['video' => 'https://youtu.be/fX_omK_cFnE','training_id' => 10],
            ['video' => 'https://youtu.be/Wa-T8TQKp04','training_id' => 10],

            // Верхний плечевой пояс
            // WorkUbuntu FireFox nesmelov.robot@gmail.com
            ['video' => 'https://youtu.be/LAXY0rirBlA','training_id' => 11],
            ['video' => 'https://youtu.be/hMBTynD2JFc','training_id' => 11],
            ['video' => 'https://youtu.be/Yf-7kpDEPKI','training_id' => 11],
            ['video' => 'https://youtu.be/LBJoEyCoeBY','training_id' => 11],
            ['video' => 'https://youtu.be/QpEvPDmiWDk','training_id' => 11],
            ['video' => 'https://youtu.be/r5Ax1VMReDc','training_id' => 11],
            ['video' => 'https://youtu.be/i0uZbvz2oq4','training_id' => 11],
            ['video' => 'https://youtu.be/6x2ltCyfH1c','training_id' => 11],
            ['video' => 'https://youtu.be/FpZCe_Zgdbs','training_id' => 11],
            ['video' => 'https://youtu.be/ORocyocHEmw','training_id' => 11],

            // Коленные суставы
            // Old FireFox nesmelov.and.company@gmail.com
            ['video' => 'https://youtu.be/AMq-NzCGRfA','training_id' => 12],
            ['video' => 'https://youtu.be/o1GpFICWu0Q','training_id' => 12],
            ['video' => 'https://youtu.be/k9jc193Nxs8','training_id' => 12],
            ['video' => 'https://youtu.be/rsP_kKHq-A4','training_id' => 12],
            ['video' => 'https://youtu.be/5Q2J5NBOR1c','training_id' => 12],
            ['video' => 'https://youtu.be/XAQWwrxnyY4','training_id' => 12],
            ['video' => 'https://youtu.be/_gNqjgN6Wng','training_id' => 12],
            ['video' => 'https://youtu.be/auVavhbFRh4','training_id' => 12],
            ['video' => 'https://youtu.be/vJG2fuUiLsI','training_id' => 12],
            ['video' => 'https://youtu.be/mWjqDVU-wd4','training_id' => 12],

            // Поясничный отдел
            // Xrenovo FireFox mail.robot192@gmail.com
            ['video' => 'https://youtu.be/gwFe-MNmyaQ','training_id' => 13],
            ['video' => 'https://youtu.be/DpLsQZi-flw','training_id' => 13],
            ['video' => 'https://youtu.be/20zq-X4DPaA','training_id' => 13],
            ['video' => 'https://youtu.be/-uXXrrouhhw','training_id' => 13],
            ['video' => 'https://youtu.be/frt0fUQRVow','training_id' => 13],
            ['video' => 'https://youtu.be/T4_bLvfkIqo','training_id' => 13],
            ['video' => 'https://youtu.be/X3xGt6DXt1E','training_id' => 13],
            ['video' => 'https://youtu.be/RXylAcccpDM','training_id' => 13],
            ['video' => 'https://youtu.be/MHIskYLI0NI','training_id' => 13],
            ['video' => 'https://youtu.be/HwkVnMX_apw','training_id' => 13],
            ['video' => 'https://youtu.be/izS1t8kTEvo','training_id' => 13],

            // Укрепление мышц тазов дна
            // Old FireFox nesmelov.and.company@gmail.com
            ['video' => 'https://youtu.be/SIqcAQPcj-E','training_id' => 14],
            ['video' => 'https://youtu.be/XjOQT3i-4kg','training_id' => 14],
            ['video' => 'https://youtu.be/Scy7oWZ3kUU','training_id' => 14],
            ['video' => 'https://youtu.be/rNmrMlaatOI','training_id' => 14],
            ['video' => 'https://youtu.be/bz4_GXHCxqc','training_id' => 14],
            ['video' => 'https://youtu.be/i_ppBOL08A0','training_id' => 14],
            ['video' => 'https://youtu.be/5mPtf_403Kw','training_id' => 14],
            ['video' => 'https://youtu.be/U6QMaG79gvg','training_id' => 14],
            ['video' => 'https://youtu.be/_sNCcBZ7u24','training_id' => 14],
            ['video' => 'https://youtu.be/XUmt8iIQnPM','training_id' => 14],

            // Main FireFox myfit.robot@gmail.com
            // Голеностопный сустав
            ['video' => 'https://youtu.be/0jxsOt8D4vk','training_id' => 15],
            ['video' => 'https://youtu.be/tA3-9-j2XUA','training_id' => 15],
            ['video' => 'https://youtu.be/t4AcSy-WdAM','training_id' => 15],
            ['video' => 'https://youtu.be/7g7o3NoImyg','training_id' => 15],
            ['video' => 'https://youtu.be/KS6ylxt7zps','training_id' => 15],
            ['video' => 'https://youtu.be/Gzu6ILgV2nc','training_id' => 15],
            ['video' => 'https://youtu.be/u4TAkxkBP-A','training_id' => 15],
            ['video' => 'https://youtu.be/oTtG-RZCsvU','training_id' => 15],
            ['video' => 'https://youtu.be/bdUHqZ__2QI','training_id' => 15],
            ['video' => 'https://youtu.be/VzKC0o1r_0s','training_id' => 15],

            //------------------------------------------------------------------- TRX
            // TRX №1
            // Main Opera robot.stroter@gmail.com
            ['video' => 'https://youtu.be/DDNS-mubwcY','training_id' => 16],
            ['video' => 'https://youtu.be/r_L_ldIYCYo','training_id' => 16],
            ['video' => 'https://youtu.be/BmgoS5w-DYQ','training_id' => 16],
            ['video' => 'https://youtu.be/8Gy8-s1MeLY','training_id' => 16],
            ['video' => 'https://youtu.be/_JQMAPzEj88','training_id' => 16],
            ['video' => 'https://youtu.be/CVV6ZnF4-4E','training_id' => 16],
            ['video' => 'https://youtu.be/oRHcti_EIhc','training_id' => 16],
            ['video' => 'https://youtu.be/COrz8ybl0sg','training_id' => 16],
            ['video' => '','training_id' => 16],

            // TRX №2
            // Xrenovo FireFox mail.robot192@gmail.com
            ['video' => 'https://youtu.be/YQqdPIFN2Zg','training_id' => 17],
            ['video' => 'https://youtu.be/cj_04nZZEUs','training_id' => 17],
            ['video' => 'https://youtu.be/PNPjwUSM3kM','training_id' => 17],
            ['video' => 'https://youtu.be/UOZVN5BE52c','training_id' => 17],
            ['video' => 'https://youtu.be/wG0OsSAqM5w','training_id' => 17],
            ['video' => 'https://youtu.be/flhJbK1jIAI','training_id' => 17],

            // TRX №3
            // Xrenovo FireFox mail.robot192@gmail.com
            ['video' => 'https://youtu.be/a5X4X3SokF8','training_id' => 18],
            ['video' => 'https://youtu.be/aeT_LpBUkBE','training_id' => 18],
            ['video' => 'https://youtu.be/xX9y1KRBMfg','training_id' => 18],
            ['video' => 'https://youtu.be/DRm6I1hZW3g','training_id' => 18],
            ['video' => 'https://youtu.be/8MkkoJ556hI','training_id' => 18],
            ['video' => 'https://youtu.be/kwtYApP9GCw','training_id' => 18],
            ['video' => 'https://youtu.be/C7ugfJCyaEc','training_id' => 18],
            ['video' => 'https://youtu.be/OnXL8Xfl_-s','training_id' => 18],
            ['video' => 'https://youtu.be/cKB4chlxyXY','training_id' => 18],
        ];
        
        foreach ($dataTrainings as $k => $training) {
            $training['photo'] = 'images/trainings/training'.($k+1).'.jpg';
            Training::create($training);
        }
        
        foreach ($dataGoals as $goal) {
            TrainingGoal::create($goal);
        }
        
        foreach ($dataVideos as $video) {
            TrainingVideo::create($video);
        }
    }
}