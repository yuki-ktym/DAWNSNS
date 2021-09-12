@extends('layouts.login')

@section('content')

<div class="search-form">
    {!! Form::open(['url' => '/search']) !!}
    {!! Form::input('text','userSearch',null,['required','class'=>'form-control','placeholder' => 'ユーザー名']) !!}
    {!! Form::submit('検索') !!}
    {!! Form::close() !!}
</div>

<h1>検索結果</h1>
@if(isset($users))
<table>
 @foreach ($users as $users)
    <!-- <td><img class="icon-images" src="images/{{$user->images}}"></td> -->
    <td>{{$user->username}}</td>
@endforeach
</table>
@endif

@endsection