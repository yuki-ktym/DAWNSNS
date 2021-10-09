@extends('layouts.logout')

@section('content')

<div class="addedPage">
    <div class="textAdded">
        <div class="addedUp">
            <p class="text">{{Session('username')}}さん、</p>
            <p class="text">ようこそ！DAWNSNSへ！</p>
        </div>
        <div class="addedDown">
            <p class="text">ユーザー登録が完了しました。</p>
            <p class="text">さっそく、ログインをしてみましょう</p>
        </div>

    </div>
    <p class="LoRtn"><a class="loginBtn" href="/login">ログイン画面へ</a></p>

</div>

@endsection