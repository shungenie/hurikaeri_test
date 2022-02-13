<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <div class="p-5">
        <p class="h1 mb-3">Week {{ $week->week_number }}</p>
        <p class="h3">現在設定されている課題</p>
        <div class="mb-3">
            @foreach ($week->teaching_materials as $teaching_material)
                <p>
                    <span>
                        {{ $loop->iteration }}.
                    </span>
                    <span>
                        {{ $teaching_material->detail }}
                    </span>
                </p>
            @endforeach
            @if (count($week->teaching_materials) == 0)
                まだ設定されていません
            @endif
        </div>
        <p class="h3">課題を作成する</p>
        <form action="" method="post">
            @csrf
            <input type="hidden" name="week_id" value="{{ $week->id }}">
            <input type="hidden" name="week" value="{{ $week->week_number }}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">課題の内容</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" id="exampleFormControlTextarea1"
                    rows="3" name="detail"></textarea>
                @error('detail')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">送信</button>
        </form>
    </div>
</body>

</html>
