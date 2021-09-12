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


    public function create( Request $request){
        $tweet = $request->input('tweet');
        \DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => Auth::id(),
        ]);
        return redirect('/top');
    }

    // 未完成
    public function update($id){
        \DB::table('posts')
            ->where('id', $id)
            ->first();
        return redirect('/top');
    }

    public function delete($id){
        \DB::table('posts')
            ->where('id', $id)
            ->delete();
        return redirect('/top');
    }

}


// $validator=$request->validate([// これだけでバリデーションできる
//     'post'=>['required', 'string', 'max:500'],//必須、文字、５００文字以内
// ]);