<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/style.js')}}"></script>
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>


<body>

    <header>
        <div class="rightMenu">
            <a href="/top"><img class="imgLogo" href="" src="{{asset('images/main_logo.png')}}"></a>
        </div>
    </header>


    <div class="menuContent">
        <p class="menuUsername"><?php $user = Auth::user(); ?>{{ $user->username }}さん</p>


        <!-- ハンバーガーメニュー -->
        <nav class="menu-box">
            <ul class="menu">
                <li class="menu-item"><a href="/top">ホーム</a></li>
                <li class="menu-item"><a href="/profile">プロフィール編集</a></li>
                <li class="menu-item"><a href="/logout">ログアウト</a></li>
            </ul>
        </nav>

        <div class="menu-trigger">
            <span></span>
        </div>

        <img class="menuImage" src="{{asset('images/'.$user->images)}}">


    </div>




    <div id="row">
        <div id="container">

            @yield('content')
            <!--親-->
        </div>

        <div id="side-bar">

            <div class="confirm">
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <div class="followCount">
                    <p>フォロー数</p>
                    <p><?php $id = \Auth::id();
                        $followerCount = \DB::table('follows')->where('follower', $id)->count(); ?>{{ $followerCount }}名</p>
                    <p class="followBtn"><a class="followBtnFont" href="/followList">フォローリスト</a></p>
                </div>
                <div class="followCount">
                    <p>フォロワー数</p>
                    <p><?php $id = \Auth::id();
                        $followCount = \DB::table('follows')->where('follow', $id)->count(); ?>{{ $followCount }}名</p>
                    <p class="followerBtn"><a class="followerBtnFont" href="/followerList">フォロワーリスト</a></p>
                </div>
            </div>

            <p class="userSearchBtn"><a class="userSearchBtnFont" href="/search">ユーザー検索</a></p>
        </div>

    </div>

    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
    <!-- いらない？ -->
</body>

</html>