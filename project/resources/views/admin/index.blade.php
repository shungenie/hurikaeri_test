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
    @component('components.adminHeader')

    @endcomponent
    <div class="p-5">
        @foreach ($posse_members as $posse_member)
            <div class="card w-100 mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $posse_member->name }}
                        <span>{{ $posse_member->generation($posse_member->generation_id)->current_week($posse_member->generation_id) }}</span>
                    </h5>
                    <p class="mb-0 card-text">
                        <span>メンバーID:</span>
                        <span>
                            {{ $posse_member->id }}
                        </span>
                    </p>
                    <p class="mb-0 card-text">
                        <span>基本情報:</span>
                        <span>POSSE</span>
                        <span>
                            {{ $posse_member->posse_branch }}
                        </span>
                        <span> {{ $posse_member->generation($posse_member->generation_id)->generation }}</span>
                        <span>期生</span>
                    </p>
                    <p class="mb-0 card-text">
                        <span>フェーズ:</span>
                        <span>
                            {{ $posse_member->phase_number }}
                        </span>
                    </p>
                    <p class="card-text">
                        <span>役職:</span>
                        <span>
                            @if ($posse_member->role_id === 2)
                                サーバントリーダー
                            @else
                                POSSE メンバー
                            @endif
                        </span>
                    </p>
                    <a href="{{ route('reflection_show', ['id' => $posse_member->id]) }}"
                        class="btn btn-primary">振り返りシート</a>
                    <a href="#" class="btn btn-primary">学習時間などの詳細</a>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
