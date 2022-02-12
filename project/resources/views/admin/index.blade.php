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

<body class="p-5">
    @foreach ($users as $user)
        <div class="card w-100 mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $user->name }}</h5>
                <p class="card-text">
                    @if ($user->role_id === 2)
                        サーバントリーダー
                    @else
                        POSSE メンバー
                    @endif
                </p>
                <a href="#" class="btn btn-primary">振り返りシート</a>
                <a href="#" class="btn btn-primary">学習時間などの詳細</a>
            </div>
        </div>
    @endforeach
</body>

</html>
