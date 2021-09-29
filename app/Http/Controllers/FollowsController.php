<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FollowsController extends Controller
{
    //フォローリスト
    public function followList()
    {
        $followImage = DB::table('users')
            ->join('follows', 'follows.follow', '=', 'users.id')
            ->where('follows.follower', Auth::id())
            ->select('images')
            ->get();

        $followPost = DB::table('users')
            ->join('follows', 'follows.follow', '=', 'users.id')
            ->join('posts', 'posts.user_id', '=', 'users.id')
            ->where('follows.follower', Auth::id())
            ->select('posts.*', 'users.images', 'users.username')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('follows.followList', [
            'followImage' => $followImage,
            'followPost' => $followPost
        ]);
    }
    //フォロワーリスト
    public function followerList()
    {
        $followerImage = DB::table('users')
            ->join('follows', 'follows.follower', '=', 'users.id')
            ->where('follows.follow', Auth::id())
            ->select('images')
            ->get();

        $followerPost = DB::table('users')
            ->join('follows', 'follows.follower', '=', 'users.id')
            ->join('posts', 'posts.user_id', '=', 'users.id')
            ->where('follows.follow', Auth::id())
            ->select('posts.*', 'users.images', 'users.username')
            ->orderBy('created_at', 'desc')
            ->get();


        return view('follows.followerList', [
            'followerImage' => $followerImage,
            'followerPost' => $followerPost

        ]);
    }

    // フォローする(データベースに送る値を一意にしたい！！！)
    public function followUs($id)
    {
        DB::table('follows')
            ->insert(['follower' => Auth::id(), 'follow' => $id]);
        return redirect('/search');
    }

    // フォローを外す
    public function unFollow($id)
    {
        DB::table('follows')
            ->where('follower', Auth::id())
            ->where('follow', $id)
            ->delete();
        return redirect('/search');
    }

    // ユーザープロフィール、投稿一覧
    public function userProfileList()
    {
    }

}
