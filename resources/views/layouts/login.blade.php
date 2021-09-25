<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/style.js"></script>
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
        <div id = "head">
        <h1><a href="/top"><img src="images/logo.png"></a></h1>

                <div id="image">
                    <p><img src="images/arrow.png"><?php $user=Auth::user();?>{{ $user->username }}さん</p>
                </div>
<!-- メニューボックス -->
                <nav class="menu-box">
                    <p class="menu-btn">ボタン設定</p>
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
                </nav>

    </header>
    <div id="row">
        <div id="container">

            @yield('content')
<!--親-->
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php $user=Auth::user();?><img src="images/arrow.png">{{ $user->username }}さんの</p>
                <div>
                <p>フォロー数</p>
                <p><?php $id = \Auth::id(); $followCount=\DB::table('follows')->where('follow',$id)->count(); ?>{{ $followCount }}名</p>
                <!-- フォロー数が表示できない -->
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p><?php $id = \Auth::id(); $followerCount=\DB::table('follows')->where('follower',$id)->count(); ?>{{ $followerCount }}名</p>
                <!-- フォロワー数が表示できない、直接記述すると表示される↑ -->
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>