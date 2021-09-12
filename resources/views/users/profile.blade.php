@extends('layouts.login')

@section('content')
<h2>（プロフィール）</h2>
    {!! Form::open(['url' => 'profile']) !!}

<!-- 名前 -->
    {{ Form::label('UserName') }}
    {{ Form::text('username',null,['class' => 'input']) }}
<!-- メール -->
    {{ Form::label('MailAdress') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
<!-- パスワード -->
    {{ Form::label('Password') }}
    {{ Form::text('password',null,['class' => 'input']) }}
    <!-- ここのパスワードは編集不可、表示してあるだけ -->
<!-- 新しいパスワード -->
    {{ Form::label('new Passeord') }}
    {{ Form::text('password',null,['class' => 'input']) }}
<!-- 自己紹介 -->
    {{ Form::label('Bio') }}
    {{ Form::text('bio',null,['class' => 'input']) }}
    <!-- 編集任意 -->
<!-- 画像 -->
    {{ Form::label('Icon Image') }}
    {{ Form::text('images',null,['class' => 'input']) }}
    <!-- 編集任意 -->

    <!-- FORMファザードでは初期値を入れられない？？ -->

    {!! Form::submit('更新') !!}
    {!! Form::close() !!}
@endsection