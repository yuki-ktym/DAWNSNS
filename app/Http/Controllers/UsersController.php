<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class UsersController extends Controller
{
    //フォームのへ表示する役割
    public function profile(){
        $userlist = \DB::table('users')
        ->where('id',Auth::id())
        ->first();

        return view('users.profile',[
            'userlist'=>$userlist
        ]);
    }

    // アップデートする役割
    public function update(Request $request){
        $username=$request->input('username');
        $mail=$request->input('mail');
        $password=$request->input('newPassword');
        $bio=$request->input('bio');
        $file=$request->file('images');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('images', $fileName, 'public_uploads');
        // dd($fileName);
        //検索機能を実装したら応用して編集
        // \DB::table('users')
        // ->where('id',$id)
        // ->update([
        //     'username'=>$username,
        //     'mail'=>$mail,
        //     'password'=>$password,
        //     'bio'=>$bio,
        //     // fileのテキストと画像データを両方アップする命令をする
        //     'file'=>$file,
        //     'updated_at' => now()
        // ]);

        return redirect('/profile');
    }



// 検索機能実装（ユーザー情報を表示※ログインユーザーは非表示、曖昧検索）
    public function search(Request $request){
        // 検索ワード受け取り
        $userSearch=$request->input('userSearch');
        // データベース接続
        $user=\DB::table('users');

      //もしキーワードが入力されている場合
      if(!empty($userSearch)){
        $person=$user->where('username','LIKE','%'.$userSearch.'%')
            ->get();
        }
     //入力がなかったら自分以外のユーザーの一覧表示
      else{
        $person=$user->where('id','<>',Auth::id())
          ->get();
        }

        return view('users.search',['person'=>$person]
    );
    }


}