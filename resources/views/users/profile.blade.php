@extends('layouts.login')

@section('content')


    {!! Form::open(['url' => '/update-u','files'=>'true']) !!}
    {!! Form::hidden('id', $userlist->id) !!}
<!-- 名前 -->
    {{ Form::label('UserName') }}
    {{ Form::text('username',$userlist->username,['required','class' => '']) }}
    <br>
<!-- メール -->
    {{ Form::label('MailAdress') }}
    {{ Form::text('mail',$userlist->mail,['required','class' => '']) }}
    <br>
<!-- パスワード（編集不可※readonly、ここは入力欄ではなくて表示しているだけ）-->
    {{ Form::label('Password') }}
    {{ Form::input('password','password',$userlist->password,['required','class' =>'','readonly']) }}
    <br>
<!-- 新しいパスワード -->
    {{ Form::label('new Password') }}
    {{ Form::input('password','newPassword',null,['']) }}
    <br>
<!-- 自己紹介 -->
    {{ Form::label('Bio') }}
    {{ Form::textarea('bio',$userlist->bio,['','class' => '']) }}
    <!-- 鉤括弧で行の大きさ変えられる -->
    <br>
    <!-- 編集任意 -->
<!-- 画像（ユーザーアイコン用の画像、任意）-->
    {{ Form::label('Icon Image') }}
    {{ Form::file('images') }}
    <br>
    <!-- 編集任意 -->

    <!-- FORMファザードでは初期値を入れられない？？ ＝＞入れられる！$postlist->postsを（）に入れる-->

    {!! Form::submit('更新') !!}
    {!! Form::close() !!}


@endsection