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
        <p class="h3">現在設定されている日付</p>
        <div class="mb-3">
            @foreach ($week->start_date_of_weeks as $start_date_of_week)
                <div>
                    <p>
                        <span>
                            {{ $start_date_of_week->generation($start_date_of_week->generation_id)->generation }}期生開始日:
                        </span>
                        <span>
                            {{ $start_date_of_week->start_date }}
                        </span>
                    </p>
                </div>
            @endforeach
            @if (count($week->start_date_of_weeks) == 0)
                まだ設定されていません
            @endif
        </div>
        <p class="h3">日付を設定する</p>
        <form action="" method="post">
            @csrf
            <input type="hidden" name="week_id" value="{{ $week->id }}">
            <div class="form-group">
                <label for="exampleFormControlSelect1">期生</label>
                <select class="form-control" id="exampleFormControlSelect1" name="generation_id">
                    @foreach ($generations as $generation)
                        <option value="{{ $generation->id }}">{{ $generation->generation }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">開始日</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                    id="exampleFormControlInput2" name="start_date">
                @error('start_date')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">送信</button>
        </form>
    </div>
</body>

</html>
