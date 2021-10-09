@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p class="dawnWelcome">Social Network Service</p>

<div class="loginMainVisual">
    <p class="dawnH">DAWNのSNSへようこそ</p>
    <div class="mailPass">
        <div class="content">
            {{ Form::label('MainAdress') }}
            {{ Form::text('mail',null,['class' => 'input']) }}
        </div>
        <div class="content">
            {{ Form::label('Password') }}
            {{ Form::password('password',['class' => 'input']) }}
        </div>
        <p class="loginBottom">{{ Form::submit('ログイン') }}</p>
    </div>

    <p class="textColor"><a class="newUserBottom" href="/register">新規ユーザーの方はこちら</a></p>

</div>

{!! Form::close() !!}

@endsection