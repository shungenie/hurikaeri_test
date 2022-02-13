<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/reflectionSheet.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="w-100">
    <div>
        @component('components.header', ['user' => $user])

        @endcomponent
    </div>
    <div class="ml-3 mb-3">
        <p>表示するコース</p>
        <form action="" method="get">
            <select name="course_id" id="" class="form-control w-25 mb-2 d-inline">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary" type="submit">選択</button>
        </form>
    </div>
    <div>
        <div class="reflection_sheet border">
            <div class="border" style="width:300px; flex-shrink: 0;">
                <p class="mb-0 border">week</p>
                <div class="border">日付</div>
                <div id="study_time_title">
                    <div class="border">
                        合計時間
                    </div>
                    <div class="d-flex w-100">
                        <div class="border w-100 review_time_title">
                            復習時間
                        </div>
                        <div class="border w-100 assignment_time_title">
                            今週の課題
                        </div>
                    </div>
                </div>
                <div class="border" id="teaching_material_title">
                    オンライン教材
                </div>
                <div class="border" id="posse_assignment_title">
                    POSSE 課題
                </div>
                <div class="border">
                    7つの振り返り(人格)
                </div>
                <div class="personality_reflection_step_title border">1.よくできた点は何か？</div>
                <div class="personality_reflection_step_title border">2.なぜうまくいったのか？</div>
                <div class="personality_reflection_step_title border">3.続けた方が方が良いことは何か？</div>
                <div class="personality_reflection_step_title border">4.うまくいかなかった点は何か？</div>
                <div class="personality_reflection_step_title border">5.なぜうまくいかなかったのか？</div>
                <div class="personality_reflection_step_title border">6.今後やめた方がよいこと何か？</div>
                <div class="personality_reflection_step_title border">7.今後改善すべき点は何か？</div>
                <div class="border">
                    7つの振り返り(学習)
                </div>
                <div class="learning_reflection_step_title border">1.よくできた点は何か？</div>
                <div class="learning_reflection_step_title border">2.なぜうまくいったのか？</div>
                <div class="learning_reflection_step_title border">3.続けた方が方が良いことは何か？</div>
                <div class="learning_reflection_step_title border">4.うまくいかなかった点は何か？</div>
                <div class="learning_reflection_step_title border">5.なぜうまくいかなかったのか？</div>
                <div class="learning_reflection_step_title border">6.今後やめた方がよいこと何か？</div>
                <div class="learning_reflection_step_title border">7.今後改善すべき点は何か？</div>
            </div>
            @foreach ($weeks as $week)
                <div class="border" style="width:600px; flex-shrink: 0;">
                    <p class="mb-0 border">{{ $week->week_number }}週目</p>
                    <div class="border">{{ $week->start_date_of_week($week->id, $user->generation_id) }}~
                    </div>
                    <div class="study_time">
                        <div class="border @if ($week->was_not_inputted_study_time($user->id, $week->id)) bg-danger @endif">
                            <span
                                id="total_study_time_week{{ $week->id }}">{{ $week->total_study_time($user->id, $week->id) }}</span>時間
                        </div>
                        <div class="d-flex w-100">
                            <div class="border w-100 review_time">
                                {{ $week->review_time($user->id, $week->id) }}時間
                            </div>
                            <div class="border w-100 assignment_time">
                                {{ $week->assignment_time($user->id, $week->id) }}時間
                            </div>
                        </div>
                    </div>
                    <div class="teaching_material border">
                        @foreach ($week->teaching_materials as $teaching_material)
                            <div class="d-flex border">
                                {{-- TODO: style属性で押せなくしている。変更したい場合はstyleを消す --}}
                                <label class="border mb-0" style="pointer-events:none;">
                                    <input type="checkbox" name="" data-assignment_id="{{ $teaching_material->id }}"
                                        class="checkbox d-block" id="" @if ($teaching_material->is_done($user->id, $teaching_material->id)) checked @endif>
                                </label>
                                <span class="border d-block w-100">{{ $teaching_material->detail }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="posse_assignment border">
                        @foreach ($week->posse_assignments as $posse_assignment)
                            <div class="d-flex border">
                                <label class="border mb-0" style="pointer-events:none;">
                                    <input type="checkbox" name="" data-assignment_id="{{ $posse_assignment->id }}"
                                        class="checkbox d-block" id="" @if ($posse_assignment->is_done($user->id, $posse_assignment->id)) checked @endif>
                                </label>
                                <span class="border d-block w-100">{{ $posse_assignment->detail }}</span>
                            </div>
                        @endforeach
                    </div>
                    <div class="border">7つの振り返り(人格)</div>
                    @for ($i = 1; $i <= 7; $i++)
                        <div class="personality_reflection_step d-flex border">
                            <div class="border">{{ $i }}</div>
                            <div>{{ $week->personality_reflection($user->id, $week->id, $i) }}</div>
                        </div>
                    @endfor
                    <div class="border">7つの振り返り(学習)</div>
                    @for ($i = 1; $i <= 7; $i++)
                        <div class="learning_reflection_step d-flex border">
                            <div class="border">{{ $i }}</div>
                            <div>
                                {{ $week->learning_reflection($user->id, $week->id, $i) }}</div>
                        </div>
                    @endfor
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
