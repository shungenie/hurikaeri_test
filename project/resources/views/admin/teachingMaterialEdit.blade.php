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
        <p class="h1 mb-3">オンライン教材</p>

        <p class="h3">課題を編集する</p>
        <form action="" method="post" class="w-100">
            @csrf
            <input type="hidden" name="id" value="{{ $teaching_material->id }}">
            <input type="hidden" name="week" value="{{ $teaching_material->week }}">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">課題の内容</label>
                <textarea class="form-control @error('detail') is-invalid @enderror" id="exampleFormControlTextarea1"
                    rows="3" name="detail">{{ $teaching_material->detail }}</textarea>
                @error('detail')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm w-100">
                <p class="h5 mb-0 p-1">
                    送信
                </p>
            </button>
        </form>
    </div>
</body>

</html>
