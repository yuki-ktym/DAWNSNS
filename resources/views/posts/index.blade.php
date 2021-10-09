@extends('layouts.login')

@section('content')

<div class="upContainer">
  {!! Form::open(['url' => '/create']) !!}
  {!! Form::textarea('text',null,['required','class'=>'form-control','placeholder' => '何をつぶやこうか...?']) !!}
  {!! Form::image('images/post.png') !!}
  {!! Form::close() !!}
</div>


<div class="postTable">
  <table>
    @foreach ($postList as $postList)
    <tr>
      <td class="iconI"><img class="iconImage" src="images/{{$postList->images}}" alt="No Image"></td>
      <td class="nameI">{{$postList->username}}</td>
      <td class="postI">{{$postList->posts}}</td>
      <td class="createdI">{{$postList->created_at}}</td>
      @if(Auth::id() == $postList->user_id)
      <td><a class="modalopen" href="{{$postList->id}}" data-target="modal{{$postList->id}}"><img class="iconImageG" src="images/edit.png" alt=""></a></td>
      <td><a class="btn btn-danger" href="/{{$postList->id}}/delete" onclick="return confirm('本当に投稿を削除してもよろしいでしょうか？')"><img class="iconImageG" src="images/trash_h.png" alt=""></a></td>
      @endif
    </tr>
    <!-- モーダル機能を追加する -->
    <div class="modal-main js-modal" id="modal{{$postList->id}}">
      <div class="inner">
        <div class="inner-content">
          <form action=""></form>
          {!! Form::open(['url' => 'update']) !!}
          {!! Form::hidden('id', $postList->id) !!}
          {!! Form::textarea('upDate', $postList->posts, ['required', 'class' => '','maxlength'=>'150']) !!}
          <button type='submit' class='up-post-btn'><img src="images/edit.png" class="send-image"></button>
          {!! Form::close() !!}
          <div>
          </div>
        </div>
      </div>
    </div>
    @endforeach


  </table>
</div>
@endsection