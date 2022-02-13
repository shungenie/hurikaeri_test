<nav class="navbar navbar-light bg-white py-0 mb-1 px-0 px-md-1">
    <div class="container d-flex px-0">
        <div>
            <a class="navbar-brand" href="{{ route('general_index') }}">
                <img src="{{ asset('img/header-logo.png') }}" alt="ロゴ" width="128" height="64">
            </a>
        </div>
        <div>
            <a class="text-white bg-primary bg-gradient px-4 py-2 rounded-pill bg-gradient-to-r from-blue-600 to-blue-200"
                href="{{ route('general_index') }}">振り返りシート画面へ</a>
            <a class="text-white bg-primary bg-gradient px-4 py-2 rounded-pill bg-gradient-to-r from-blue-600 to-blue-200"
                href="{{ route('curriculum') }}">カリキュラム画面へ</a>
            <a class="text-white bg-primary bg-gradient px-4 py-2 rounded-pill bg-gradient-to-r from-blue-600 to-blue-200"
                href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('user-logout-form').submit();">
                ログアウト
            </a>
            <form action="{{ route('logout') }}" method="post" id="user-logout-form" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>
