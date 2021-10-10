@extends('layouts.login')

@section('content')
<h1>Follow list</h1>
<div class="listIcon">

@foreach($followImage as $followImage)
    <td><a href="/follows/{{$followImage->follow}}/userProfile"><img class="iconImage" src="images/{{$followImage->images}}" alt="followImage"></a></td>
@endforeach
</div>

<div>
    <table>
        @foreach($followPost as $followPost)
        <tr>
            <td class="iconI"><a href=""><img class="iconImage" src="images/{{$followPost->images}}" alt="followImage"></a></td>
            <td class="nameI">{{$followPost->username}}</td>
            <td class="postI">{{$followPost->posts}}</td>
            <td class="createdI">{{$followPost->created_at}}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
