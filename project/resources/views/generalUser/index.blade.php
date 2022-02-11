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

<body>
    <div class="d-flex">
        <div>
            <p>week</p>
            <div id="teaching_material_title">
                オンライン教材
            </div>
            <div>
                7つの振り返り(人格)
            </div>
            <div class="personality_reflection_step_title">1.よくできた点は何か？</div>
            <div class="personality_reflection_step_title">2.なぜうまくいったのか？</div>
            <div class="personality_reflection_step_title">3.続けた方が方が良いことは何か？</div>
            <div class="personality_reflection_step_title">4.うまくいかなかった点は何か？</div>
            <div class="personality_reflection_step_title">5.なぜうまくいかなかったのか？</div>
            <div class="personality_reflection_step_title">6.今後やめた方がよいこと何か？</div>
            <div class="personality_reflection_step_title">7.今後改善すべき点は何か？</div>
        </div>
        @foreach ($weeks as $week)
            <div style="width:600px">
                <p>{{ $week->week_number }}週目</p>
                <div class="teaching_material">
                    @foreach ($week->teaching_materials as $teaching_material)
                        <div>
                            <input type="checkbox" name="" data-teaching_material_id="{{ $teaching_material->id }}"
                                class="checkbox" id="" @if ($teaching_material->is_done($user->id, $teaching_material->id)) checked @endif>
                            <span>{{ $teaching_material->detail }}</span>
                        </div>
                    @endforeach
                </div>
                <div>7つの振り返り(人格)</div>
                @for ($i = 1; $i <= 7; $i++)
                    <div class="personality_reflection_step">
                        <span>{{ $i }}</span>
                        <textarea type="text" class="d-inline-block personality_reflection" style="width:95%"
                            data-week="{{ $week->week_number }}"
                            data-reflection_step={{ $i }}>{{ $week->personality_reflection($user->id, $week->week_number, $i) }}</textarea>
                    </div>
                @endfor
            </div>
        @endforeach
    </div>
</body>

</html>
