<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;


class UsersController extends Controller
{
    //フォームのへ表示する役割
    public function profile()
    {
        $userlist = \DB::table('users')
            ->where('id', Auth::id())
            ->first();

        return view('users.profile', [
            'userlist' => $userlist
        ]);
    }

    // バリデーション設定未完成（項目、メッセージ、イメージのファイル形式の指定）
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'username' => 'min:2|max:12',
                'mail' => 'email|min:4|max:100',
                // 'password' => '|unique:users',
                'bio' => 'max:200'
            ],
            [
                // 名前
                'username.min' => '4文字以下です',
                'username.max' => '12文字以上です',
                // メール
                'mail.email' => 'メールアドレスを記載',
                'mail.min' => '4文字以下です',
                'mail.max' => '100文字以上です',
                // 新しいパスワード
                // 'newPassword.min' => '4文字以下です',
                'password.max' => '12文字以上です',
                // 'password.different' => '現在使用しているパスワードとは異なるようにして下さい',
                // 自己紹介
                'bio.max' => '200文字以内で記入'
            ]
        );
    }

    public function update(Request $request)
    {
        $id = \Auth::id();
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('newPassword');
        $bio = $request->input('bio');
        $file = $request->file('images');

        if (isset($password) && isset($file)) {
            $data = $request->input();
            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('images', $fileName, 'public_uploads');
                // ↑↑↑引数(フォルダパス名、ファイル名、ディスク名)↑↑↑画像を任意の名前をつけて保存
                \DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'username' => $username,
                        'mail' => $mail,
                        'password' => $password,
                        'bio' => $bio,
                        'images' => $fileName,
                        'updated_at' => now()
                    ]);

                return redirect('/profile');
            }
        } elseif (isset($password)) {
            $data = $request->only('username', 'mail', 'bio', 'newPassword');
            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                \DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'username' => $username,
                        'mail' => $mail,
                        'password' => $password,
                        'bio' => $bio,
                        'updated_at' => now()
                    ]);

                return redirect('/profile');
            }
        } elseif (isset($file)) {
            $data = $request->only('username', 'mail', 'bio', 'images');
            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('images', $fileName, 'public_uploads');
                \DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'username' => $username,
                        'mail' => $mail,
                        'bio' => $bio,
                        'images' => $fileName,
                        'updated_at' => now()
                    ]);

                return redirect('/profile');
            }
        } else {
            $data = $request->only('username', 'mail', 'bio', 'images');
            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/profile')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                \DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'username' => $username,
                        'mail' => $mail,
                        'bio' => $bio,
                        'updated_at' => now()
                    ]);

                return redirect('/profile');
            }
        }
    }


    // 検索機能実装（ユーザー情報を表示※ログインユーザーは非表示、曖昧検索）
    public function search(Request $request)
    {
        // 検索ワード受け取り
        $userSearch = $request->input('userSearch');
        // データベース接続
        $user = \DB::table('users');

        //もしキーワードが入力されている場合
        if (!empty($userSearch)) {
            $person = $user->where('username', 'LIKE', '%' . $userSearch . '%')
                ->get();
        }
        //入力がなかったら自分以外のユーザーの一覧表示
        else {
            $person = $user->where('id', '<>', Auth::id())
                ->get();
        }

        return view(
            'users.search',
            ['person' => $person]
        );
    }
}
