@extends('layouts.login')

@section('content')
<h1>Follower list</h1>
@foreach($followerImage as $followerImage)
<tr>
    <td><a href="/follows/{{$followerImage->follower}}/userProfile"><img class="iconImage" src="images/{{$followerImage->images}}" alt="followerImage"></a></td>
</tr>
@endforeach
<div>
    <table>
        @foreach($followerPost as $followerPost)
        <tr>
            <td><a href=""><img class="iconImage" src="images/{{$followerPost->images}}" alt="followImage"></a></td>
            <td>{{$followerPost->username}}</td>
            <td>{{$followerPost->posts}}</td>
            <td>{{$followerPost->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection