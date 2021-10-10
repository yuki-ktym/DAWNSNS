@extends('layouts.login')

@section('content')
<h1>Follower list</h1>
<div class="listIcon">
@foreach($followerImage as $followerImage)
<tr>
    <td><a href="/follows/{{$followerImage->follower}}/userProfile"><img class="iconImage" src="images/{{$followerImage->images}}" alt="followerImage"></a></td>
</tr>
@endforeach
</div>
<div>
    <table>
        @foreach($followerPost as $followerPost)
        <tr>
            <td class="iconI"><a href=""><img class="iconImage" src="images/{{$followerPost->images}}" alt="followImage"></a></td>
            <td class="nameI">{{$followerPost->username}}</td>
            <td class="postI">{{$followerPost->posts}}</td>
            <td class="createdI">{{$followerPost->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection


