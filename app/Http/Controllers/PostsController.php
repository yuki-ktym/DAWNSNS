<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

// Requestクラスとrequestインスタンスについて、上記useを使用している（Requestクラスとrequestインスタンス）

class PostsController extends Controller
{

    public function index(){
        $user = Auth::user();
        $postlist = \DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('posts.*','users.images','users.username')
        ->where('user_id',Auth::id())
        ->get();
        return view('posts.index',[
            'user'=>$user,
            'postlist'=>$postlist
        ]);
    }
    // joinメソッドの第一引数は結合したいテーブル名（初期値にpostsを指定しているので、ここではusersを指定）
    // selectメソッドで必要なカラムを指定してあげる
    // whereでidを取得して、現在ログインしているユーザーの投稿を取得している
    // 最終的な結果をgetで取得


    public function create(Request $request){
        $tweet = $request->input('tweet');
        \DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => Auth::id(),
        ]);
        return redirect('/top');
    }

    // 未完成(https://readouble.com/laravel/5.7/ja/queries.html#:~:text=%E3%81%A6%E3%81%8F%E3%81%A0%E3%81%95%E3%81%84%E3%80%82-,UPDATE,-%E3%83%87%E3%83%BC%E3%82%BF%E3%83%99%E3%83%BC%E3%82%B9%E3%81%B8%E3%83%AC%E3%82%B3%E3%83%BC%E3%83%89)
    public function update(Request $request){
        $post=$request->input('upDate');
        $id = $request->input('id');
        \DB::table('posts')
            ->where('id', $id)
            ->update([
                'posts' => $post,
                'updated_at' => now()
            ]);
        return redirect('/top');
    }

    // 指定のIDを削除する処理
    public function delete($id){
        // ここの$idはルートパラメータと言って、ルートの定義と関係しています！
        \DB::table('posts')
        // データベースのpostsテーブルへ接続している
            ->where('id', $id)
            // 指定する（postsテーブルのidと,フォームから送られてきたIDが一致する箇所の投稿内容を変更する）
            ->delete();
            // 削除する命令ーーー
        return redirect('/top');
        // topへ遷移ーーー
    }

}


// $validator=$request->validate([// これだけでバリデーションできる
//     'post'=>['required', 'string', 'max:500'],//必須、文字、５００文字以内
// ]);

// // 解説
// public function create( Request $request){
//     // createメソッド（ビューとルートではURL）に関数入れます。動かしたい内容です。
//     $tweet = $request->input('tweet');
//     // ビューのinputから入力情報持ってきてます。
//     \DB::table('posts')->insert([
//     // データベースと繋げています。場所はpostsテーブルです。insertでデータベースに突っ込むよ！という意味。追加挿入。
//         'posts' => $tweet,
//         'user_id' => Auth::id(),
//         // postsテーブルにカラムpostsとuser_id（投稿内容、ログインしているユーザーID）を突っ込むよ！
//     ]);
//     return redirect('/top');
//     // 従気処理が完了後の遷移先（URL転送）
//     // 新規投稿に成功したら、TOPniリダイレクト！
// }
