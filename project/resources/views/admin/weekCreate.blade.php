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
            <div class="form-group">
                <label for="exampleFormControlInput1">Week Number</label>
                <input type="number" class="form-control @error('week_number') is-invalid @enderror"
                    id="exampleFormControlInput1" name="week_number" value="{{ old('week_number') }}">
                @error('week_number')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput2">フェーズ</label>
                <input type="number" class="form-control @error('phase_number') is-invalid @enderror"
                    id="exampleFormControlInput2" name="phase_number" value="{{ old('phase_number') }}">
                @error('phase_number')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm">送信</button>
        </form>
    </div>
</body>

</html>
