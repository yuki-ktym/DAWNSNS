@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<!-- フォームの開始 -->

<h2>DAWNSNS新規登録フォーム</h2>

<h2>ユーザ名</h2>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
<!-- 引数を指定（inputに指定されるカラム値、valueに設定される値(デフォルト値)、[オプション設定]） -->
{{ $errors->first('username') }}
<!-- エラーメッセージの表示、firstで指定したカラムの一番初めのバリデーション項目を指定 -->

<h2>メールアドレス</h2>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
{{ $errors->first('mail') }}


<h2>パスワード</h2>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
{{ $errors->first('password') }}


<h2>パスワード（確認用）</h2>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
{{ $errors->first('password-confirm') }}


{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection


