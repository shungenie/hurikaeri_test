<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @component('components.curriculumHeader')

    @endcomponent
    <div class="container p-5">
        <div class="row">
            <div class="col-7">
                @foreach ($weeks as $week)
                    <div class="card w-100 mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $week->week_number }}週目</h5>
                            <p class="card-text">
                                <span>フェーズ:</span>
                                <span>{{ $week->phase_number }}</span>
                            </p>
                            <a href="{{ route('week_edit', ['id' => $week->id]) }}"
                                class="btn btn-primary">フェーズ編集画面へ</a>
                            <a href="{{ route('week_start_edit', ['id' => $week->id]) }}"
                                class="btn btn-primary">スタート日時編集画面へ</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</body>

</html>
