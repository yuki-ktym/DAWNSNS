<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }




// // ログアウト
//     public function Logout(Request $request){
//         Auth::logout();
//         return redirect('login');
//     }

}
