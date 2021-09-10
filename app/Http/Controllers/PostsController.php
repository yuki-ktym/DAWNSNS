<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
// Requestクラスとrequestインスタンスについて、上記useを使用している（Requestクラスとrequestインスタンス）

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
dd($user);
        $postlist = \DB::table('posts')->get();
        return view('posts.index',[
            'user'=>$user,
            'postlist'=>$postlist
        ]);
    }

    public function create( Request $request){
        $tweet = $request->input('tweet');
        \DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => auth()->user()->id
        ]);
        return redirect('/top');
    }

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