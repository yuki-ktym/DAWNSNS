<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|between:4,12',
            'mail' => 'required|string|email|between:4,100|unique:users',
            'password' => 'required|alpha_num|between:4,12|unique:users',
            'password-confirm' => 'required|alpha_num|between:4,12|same:password',
        ],[
            'username.required' =>'名前必須です！',
            'mail.required' =>'メール必須です！',
            'password.required' =>'パスワード必須です！',
            'password-confirm.required' =>'パスワード確認は必須です！',
        ]
    );
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            // リクエストメソッドの取得

            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/register')
                ->withErrors($validator)
                ->withInput();
                }else{

            $this->create($data);
            return redirect('/added');
        }
        }

        return view('auth.register');

    }

    public function added(){
        return view('auth.added');
    }
}



