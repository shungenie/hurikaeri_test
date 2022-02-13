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
        <p class="h1 mb-3">Week {{ $week->week_number }} POSSE課題</p>
        <p class="h3">現在設定されている課題</p>
        <div class="mb-3">
            @foreach ($week->posse_assignments as $posse_assignment)
                <div class="card">
                    <div class="card-body">
                        <p class="d-inline">
                            <span>
                                {{ $loop->iteration }}.
                            </span>
                            <span>
                                {{ $posse_assignment->detail }}
                            </span>
                        </p>
                        <div class="float-right">
                            <form action="{{ route('posse_assignments_destroy', ['id' => $posse_assignment->id]) }}"
                                method="post" class="mb-3">
                                @csrf
                                <input type="hidden" name="week_id" value="{{ $week->id }}">
                                <button type="submit" class="btn btn-danger">削除</button>
                            </form>
                            <a href="{{ route('posse_assignments_edit', ['id' => $posse_assignment->id]) }}"
                                class="btn btn-primary">編集</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($week->posse_assignments) == 0)
                まだ設定されていません
            @endif
        </div>
        <p class="h3">課題を作成する</p>
        <form action="" method="post" class="w-100">
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
            <button type="submit" class="btn btn-primary btn-sm w-100">
                <p class="h5 mb-0 p-1">
                    送信
                </p>
            </button>
        </form>
    </div>
</body>

</html>
