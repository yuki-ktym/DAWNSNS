@extends('layouts.login')

@section('content')

<tr>
    <td><img class="iconImage" src="{{asset('images/'.$userProfile->images)}}" alt="followImage"></td>
    <td class="NameBio">
        <div>
            <p>Name<nobr>{{$userProfile->username}}</nobr>
            </p>
        </div>
        <div>
            <p>Bio<nobr>{{$userProfile->bio}}</nobr>
            </p>
        </div>
    </td>
    <td><button><a href="/follows/{{$userProfile->id}}/unFollow" class="unFollows-btn">フォローをはずす</a></button></td>
    <td><button><a href="/follows/{{$userProfile->id}}/followUs" class="follows-btn">フォローする</a></button></td>
</tr>

<table>
    @foreach($postList as $postList)
    <tr>
        <td class="iconI"><a href=""><img class="iconImage" src="{{asset('images/'.$postList->images)}}" alt="followImage"></a></td>
        <td class="nameI">{{$postList->username}}</td>
        <td class="postI">{{$postList->posts}}</td>
        <td class="createdI">{{$postList->created_at}}</td>
    </tr>

    @endforeach
</table>

@endsection


