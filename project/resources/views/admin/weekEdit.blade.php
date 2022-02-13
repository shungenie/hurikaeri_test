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
        <form action="" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $week->id }}">
            <div class="form-group">
                {{-- TODO:week numberの入れ替え機能を後に実装する。その際、下のスタイル属性を変更する --}}
                <label for="exampleFormControlInput1">Week Number(現在編集できません)</label>
                <input type="number" class="form-control @error('week_number') is-invalid @enderror"
                    id="exampleFormControlInput1" name="week_number" value="{{ $week->week_number }}"
                    style="pointer-events: none;">
                @error('week_number')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">コース</label>
                <select class="form-control @error('course_id') is-invalid @enderror" id="exampleFormControlSelect1"
                    name="course_id">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @if ($course->id == $week->course_id) selected @endif>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">送信</button>
        </form>
    </div>
</body>

</html>
