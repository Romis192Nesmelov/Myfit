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

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю по 15-20 минут.',
                'main_cardio_description' => 'Частота пульса 70-80% от максима.',

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
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/скакалка/гантели по 1-2 кг',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '12 упражнений (видео)',
                'main_warning_description' => '8-10 повторений / 1-2 круга',
                'main_recommendation_title' => '',
                'main_recommendation_description' => '',

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю по 15-20 минут.',
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
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/гимнастический мяч/гантели по 1-2 кг',
                'need_previous_completed' => 0,

                'warmup_warning_title' => '4-5 упражнений (фото)',
                'warmup_warning_description' => '',
                'warmup_recommendation_title' => '',
                'warmup_recommendation_description' => '',

                'main_warning_title' => '13 упражнений (видео)',
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
                'complexity' => 2,
                'duration' => 8,
                'periodicity' => '3',
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

                'main_cardio_title' => 'Оздоровительная ходьба 1-2 раза в неделю 15 минут.',
                'main_cardio_description' => ' Темп медленный.',

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
                'complexity' => 2,
                'duration' => 6,
                'periodicity' => '3',
                'equipment' => 'гимнастический коврик/fit ball',
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
                'main_cardio_description' => ' Темп медленный.',

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

                'main_cardio_title' => 'Оздоровительная ходьба 2-3 раза в неделю по 20 минут.',
                'main_cardio_description' => ' Частота пульса 70-75% от максима.',

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
            // #3 id:18
            [
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
            // #4 id:19
            [
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
            
            // Program#5
            // #1 id:20
            [
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
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 1],
            ['goal' => 'Развитие силовых показателей','training_id' => 1],
            ['goal' => 'Укрепление сердечно-сосудистой системы','training_id' => 1],
            ['goal' => 'Тренировка баланса и координации','training_id' => 1],
            
            ['goal' => 'Укрепление организма','training_id' => 2],
            ['goal' => 'Сброс лишнего веса','training_id' => 2],
            ['goal' => 'Развитие силовой выносливости','training_id' => 2],
            ['goal' => 'Проработка мышц рук и ног (Акцент на приводящую группу мышц бёдер)','training_id' => 2],
            ['goal' => 'Проработка мышц пресса и спины','training_id' => 2],
            
            ['goal' => 'Проработка мышечных групп','training_id' => 3],
            ['goal' => 'Сброс лишнего веса и коррекция фигуры','training_id' => 3],
            ['goal' => 'Укрепление связо-мышечного аппарата','training_id' => 3],
            
            ['goal' => 'Проработка всех мышечных групп ','training_id' => 4],
            ['goal' => 'Развитие силовой выносливости','training_id' => 4],
            ['goal' => 'Сброс лишнего веса','training_id' => 4],
            ['goal' => 'Развитие координации и баланс','training_id' => 4],
            
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 5],
            ['goal' => 'Упражнения на баланс и координацию','training_id' => 5],

            ['goal' => 'Общее укрепление организма Коррекция фигуры','training_id' => 6],
            ['goal' => 'Коррекция фигуры','training_id' => 6],
            ['goal' => 'Укрепление мышц пресса и спины','training_id' => 6],

            ['goal' => 'Общеукрепляющие упражнения','training_id' => 7],
            ['goal' => 'Укрепление мышц малого таза и внутренней стенки живота','training_id' => 7],
            ['goal' => 'Развитие гибкости','training_id' => 7],
            ['goal' => 'Развитие баланса и координации','training_id' => 7],

            ['goal' => 'Сброс лишнего веса','training_id' => 8],
            ['goal' => 'Коррекция фигуры, локальная проработка мышечных групп','training_id' => 8],

            ['goal' => 'Укрепление мышц и восстановление эластичности поясничного отдела позвоночника.','training_id' => 9],

            ['goal' => 'Укрепление мышц, суставов, связок верхнего плечевого пояса','training_id' => 10],
            ['goal' => 'Проработка шейно-воротниковой зоны','training_id' => 10],
            ['goal' => 'Общее укрепление организма','training_id' => 10],

            ['goal' => 'Укрепление мышц и связок голеностопного сустава, улучшение подвижности в нем','training_id' => 11],
            ['goal' => 'Общеукрепляющие упражнения','training_id' => 11],

            ['goal' => 'Укрепление мышц тазового дна, улучшение кровообращения','training_id' => 12],
            ['goal' => 'Общее укрепление организма','training_id' => 12],

            ['goal' => 'Общеукрепляющая программа тренировок','training_id' => 13],

            ['goal' => 'Укрепление ССС и Дыхательной системы','training_id' => 14],
            ['goal' => 'Повышение общего тонуса организма','training_id' => 14],

            ['goal' => 'Укрепление и восстановление коленных суставов','training_id' => 15],

            ['goal' => 'Общефизическая подготовка','training_id' => 16],
            ['goal' => 'Укрепление мышц всего организма','training_id' => 16],
            ['goal' => 'Координация и баланс','training_id' => 16],
            ['goal' => 'Сброс лишнего веса','training_id' => 16],

            ['goal' => 'Функциональный режим работы','training_id' => 17],
            ['goal' => 'Развитие силовой выносливости','training_id' => 17],
            ['goal' => 'Проработка мышц всего организма','training_id' => 17],
            ['goal' => 'Повышение общей физической Подготовки; развитие баланса, гибкости.','training_id' => 17],

            ['goal' => 'Функциональный режим работы','training_id' => 18],
            ['goal' => 'Развитие силовой выносливости','training_id' => 18],
            ['goal' => 'Проработка мышц всего организма','training_id' => 18],
            ['goal' => 'Сброс лишнего веса','training_id' => 18],
            ['goal' => 'Коррекция фигуры','training_id' => 18],

            ['goal' => 'Функциональный режим работы','training_id' => 19],
            ['goal' => 'Развитие мышц всего тела','training_id' => 19],
            ['goal' => 'Наращивание сухой мышечной массы','training_id' => 19],
            ['goal' => 'Развитие силовой выносливости','training_id' => 19],
            ['goal' => 'Баланс и гибкость','training_id' => 19],

            ['goal' => 'Повышение физической подготовки','training_id' => 20],
            ['goal' => 'Укрепление организма в целом','training_id' => 20],
            ['goal' => 'Баланс и координация','training_id' => 20],
            ['goal' => 'Коррекция фигуры и сброс веса','training_id' => 20],

            ['goal' => 'Развитие силовой выносливости','training_id' => 21],
            ['goal' => 'Баланс и координация','training_id' => 21],
            ['goal' => 'Сброс лишнего веса','training_id' => 21],
            ['goal' => 'Укрепление мышц и связок','training_id' => 21],

            ['goal' => 'Повышение общей выносливости Укрепление организма в целом','training_id' => 22],
            ['goal' => 'Сброс лишнего веса','training_id' => 22],
            ['goal' => 'Развитие баланса и координации','training_id' => 22],

            ['goal' => 'Укрепление организма','training_id' => 23],
            ['goal' => 'Активное жиросжигание','training_id' => 23],

            ['goal' => 'Укрепление организма','training_id' => 24],
            ['goal' => 'Активное жиросжигание','training_id' => 24],

            ['goal' => 'Укрепление организма','training_id' => 25],
            ['goal' => 'Активное жиросжигание','training_id' => 25],

            ['goal' => 'Укрепление организма','training_id' => 26],
            ['goal' => 'Активное жиросжигание','training_id' => 26]
        ];
        
        $dataVideos = [
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

            ['video' => 'https://youtu.be/s_umAv8Rv4Q','training_id' => 2],
            ['video' => 'https://youtu.be/GQfBU663bMk','training_id' => 2],
            ['video' => 'https://youtu.be/8H3jK0TSK0Y','training_id' => 2],
            ['video' => 'https://youtu.be/q6eEri6PXkw','training_id' => 2],
            ['video' => 'https://youtu.be/Nj5cd9g4_lQ','training_id' => 2],
            ['video' => '','training_id' => 2],
            ['video' => '','training_id' => 2],
            ['video' => '','training_id' => 2],
            ['video' => '','training_id' => 2],
            ['video' => '','training_id' => 2],

            ['video' => 'https://youtu.be/c7FKxhxXp7M','training_id' => 3],
            ['video' => 'https://youtu.be/RLgSolITwuQ','training_id' => 3],
            ['video' => 'https://youtu.be/Hr7hlx0euXA','training_id' => 3],
            ['video' => 'https://youtu.be/KmmgeGU2QDM','training_id' => 3],
            ['video' => 'https://youtu.be/YzGBqIyql98','training_id' => 3],
            ['video' => 'https://youtu.be/i0zKfpGHiIE','training_id' => 3],
            ['video' => 'https://youtu.be/EmAmAfTa1-I','training_id' => 3],
            ['video' => 'https://youtu.be/6pkPuyBWtQI','training_id' => 3],
            ['video' => 'https://youtu.be/xVs9NEPwcxc','training_id' => 3],

            ['video' => 'https://youtu.be/1f-B_8-bvIA','training_id' => 4],
            ['video' => 'https://youtu.be/oxYHfd0MNTw','training_id' => 4],
            ['video' => 'https://youtu.be/_2zhw14A6Aw','training_id' => 4],
            ['video' => 'https://youtu.be/md-dPNGkrHU','training_id' => 4],
            ['video' => 'https://youtu.be/7MB5Txx4fRI','training_id' => 4],
            ['video' => 'https://youtu.be/UMCHOM49log','training_id' => 4],
            ['video' => 'https://youtu.be/_3n1qDaPriU','training_id' => 4],
            ['video' => '','training_id' => 4],
            ['video' => '','training_id' => 4],
            ['video' => '','training_id' => 4],
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