<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // 初期処理、middlewareがゲストだった場合の処理
    // except、指定した主キーを持たないモデルをすべて返します。

    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }
            // attemptはデータベースからユーザーを見つける役割。その後TOPへ遷移
        }
        return view("auth.login");
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/login');// ここを好きな遷移先に変更する。
    }
    // logout時の遷移先も AuthenticatesUsers で定義されてしまっているので
// LoginController を上記の様に修正して無理やり遷移先を変更する。

}
