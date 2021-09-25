<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //フォローリスト
    public function followList()
    {
        return view('follows.followList');
    }
    //フォロワーリスト
    public function followerList()
    {
        return view('follows.followerList');
    }

    // フォローする
    public function followUs($id)
    {
        \DB::table('follows')
            ->insert(['follow' => $id, 'follower' => Auth::id()]);
            return redirect('/search');
        }

    // フォローを外す
    public function unFollow($id)
    {
        return back('');
    }

    // ログイン中のIDがフォローしているIDの数を表示
    // ログイン中のIDがフォローされている数を表示
    // public function followCount(){
    //     $id=Auth::id();
    //     $followCount=\DB::table('follows')
    //     ->where('follow',$id)->count();
    //     $followerCount=\DB::table('follows')
    //     ->where('follower',$id)->count();

    //     return view('posts.index',['followCount'=>$followCount,'followerCount'=>$followerCount]);
    // }


    // // ログアウト
    //     public function Logout(Request $request){
    //         Auth::logout();
    //         return redirect('login');
    //     }

}
