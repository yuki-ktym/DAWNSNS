<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;

// Requestクラスとrequestインスタンスについて、上記useを使用している（Requestクラスとrequestインスタンス）

class PostsController extends Controller
{

    public function index(){
// フォローユーザーの投稿を追加　①質問（10月2日）解決
// if文で編集削除ボタンをログイン中のユーザーのみにする
        $postList = DB::table('users')
        ->join('follows', 'follows.follow', '=', 'users.id')
        ->join('posts', 'posts.user_id', '=', 'users.id')
        ->where('follows.follower', Auth::id())
        ->orWhere('posts.user_id',Auth::id())
        ->select('posts.*', 'users.images', 'users.username')
        ->orderBy('created_at', 'desc')
        ->get();

        return view('posts.index',[
            'postList'=>$postList,
        ]);
    }
    // joinメソッドの第一引数は結合したいテーブル名（初期値にpostsを指定しているので、ここではusersを指定）
    // selectメソッドで必要なカラムを指定してあげる
    // whereでidを取得して、現在ログインしているユーザーの投稿を取得している
    // 最終的な結果をgetで取得


    public function create(Request $request){
        $tweet = $request->input('tweet');
        DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => Auth::id(),
        ]);
        return redirect('/top');
    }

    public function update(Request $request){
        $post=$request->input('upDate');
        $id = $request->input('id');
        DB::table('posts')
            ->where('id', $id)
            ->update([
                'posts' => $post,
                'updated_at' => now()
            ]);
        return redirect('/top');
    }

    public function delete($id){
        // ここの$idはルートパラメータと言って、ルートの定義と関係しています！
        DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
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
