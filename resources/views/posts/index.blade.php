@extends('layouts.login')

@section('content')


<div class="container">

<h2 class='new tweet'>新しい投稿</h2>
    {!! Form::open(['url' => '/create']) !!}
    {!! Form::input('text','tweet',null,['required','class'=>'form-control','placeholder' => '何をつぶやこうか...?']) !!}
    {!! Form::submit('ツイート') !!}
    {!! Form::close() !!}
<!-- 2,オプションの内容、入力必須、クラス設定、初期表示テキスト -->
</div>


<div>
<table>
    <caption>投稿一覧</caption>
       @foreach ($postlist as $postlist)
       <tr>
          <td><img src="images/{{$user->images}}" alt="No Image"></td>
          <td>{{$postlist->username}}</td>
          <td>{{$postlist->posts}}</td>
          <td>{{$postlist->created_at}}</td>
          <td><button class="modalopen" href="" data-target="modal">編集</button></td>
          <td><a class="btn btn-danger" href="/{{$postlist->id}}/delete" onclick="return confirm('本当に投稿を削除してもよろしいでしょうか？')">削除</a></td>
       </tr>
                 <!-- モーダル機能を追加する -->
<div class="modal-main js-modal" id="modal">
  <div class="inner">
    <div class="inner-content">
        <input type="text">
      <p class="inner-text"></p>
      <a href="/{{$postlist->id}}/updata" class="modalClose">編集</a>
    </div>
  </div>
</div>
       @endforeach

</table>
</div>
@endsection


