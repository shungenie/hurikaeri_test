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
    <div>
        @foreach ($weeks as $week)
            <p>{{ $week->week_number }}週目</p>
            @foreach ($week->teaching_materials as $teaching_material)
                <div>
                    <input type="checkbox" name="" data-teaching_material_id="{{ $teaching_material->id }}"
                        class="checkbox" id="" @if ($teaching_material->is_done($user->id, $teaching_material->id)) checked @endif>
                    <span>{{ $teaching_material->detail }}</span>
                </div>
            @endforeach
        @endforeach
    </div>
</body>

</html>
