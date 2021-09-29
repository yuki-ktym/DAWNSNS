@extends('layouts.login')

@section('content')
<h1>Follow list</h1>
@foreach($followImage as $followImage)
<tr>
    <td><a href="/userProfile"><img src="images/{{$followImage->images}}" alt="followImage"></a></td>
</tr>
@endforeach

<div>
    <table>
        @foreach($followPost as $followPost)
        <tr>
            <td><a href=""><img src="images/{{$followPost->images}}" alt="followImage"></a></td>
            <td>{{$followPost->username}}</td>
            <td>{{$followPost->posts}}</td>
            <td>{{$followPost->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection