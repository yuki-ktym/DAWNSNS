@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<!-- フォームの開始 -->
<div class="registerMainVisual">
    <h2 class="newForm">新規ユーザー登録</h2>
    <div class="formContent">
        <div class="content">
            {{ Form::label('name','ユーザー名') }}
            {{ Form::text('username',null,['class' => 'input']) }}
            <!-- 引数を指定（inputに指定されるカラム値、valueに設定される値(デフォルト値)、[オプション設定]） -->
            <p style="display:inline; color:coral">{{$errors->first('username') }}</p>
            <!-- エラーメッセージの表示、firstで指定したカラムの一番初めのバリデーション項目を指定 -->

            {{ Form::label('name','メールアドレス') }}
            {{ Form::text('mail',null,['class' => 'input']) }}
            <p style="display:inline; color:coral">{{ $errors->first('mail') }}</p>
        </div>
        <div class="content">
            {{ Form::label('name','パスワード') }}
            {{ Form::text('password',null,['class' => 'input']) }}
            <p style="display:inline; color:coral">{{ $errors->first('password') }}</p>

            {{ Form::label('name','パスワード確認') }}
            {{ Form::text('password-confirm',null,['class' => 'input']) }}
            <p style="display:inline; color:coral">{{ $errors->first('password-confirm') }}</p>
        </div>
    </div>
    <p class="registerBottom">{{ Form::submit('REGISTER') }}</p>

    <p class="textColor"><a class="retuneBottom" href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
</div>

@endsection