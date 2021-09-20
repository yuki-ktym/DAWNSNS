@extends('layouts.login')

@section('content')

<div class="search-form">
    {!! Form::open(['url' => '/search']) !!}
    {!! Form::input('text','userSearch',null,['class'=>'form-control','placeholder' => 'ユーザー名']) !!}
    {!! Form::submit('検索') !!}
    {!! Form::close() !!}
</div>

<h1>検索結果</h1>
@if(isset($person))
<table>
 @foreach ($person as $person)
 <tr>
     <td><img src="images/{{$person->images}}"></td>
    <td>{{$person->username}}</td>
</tr>
@endforeach
</table>
@endif

@endsection

<!-- 何も検索していない時は全員出す
検索された場合は曖昧検索でSQLを用いて行う
検索内には自分は入ってはいけない
条件によって更新する箇所を変えるところをプロフィールで応用する -->
