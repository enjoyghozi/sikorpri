<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function halamanlogin(){
        return view('login.login-korpri');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registrasi(){
        return view('login.registrasi');
    }

    public function simpanregistrasi(Request $request){
        User::create([
            'name' => $request->name,
            'telp' => $request->telp,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        return view('login.login-korpri');
    }

    public function showForgotform()
    {
        return view ('forgotpassword.forgot-password');
    }

    public function sendResetlink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $token = \Str::random(64);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token'=>$token,'email'=>$request->email]);
        $body = "Kami mengirimkan sebuah link permintaan untuk me-reset password anda di </b> Aplikasi SIKORPRI yang berkaitan dengan ".$request->email.". Anda dapat me-Reset password anda melalui link dibawah ini";

        \Mail::send('email-forgot',['action_link'=>$action_link, 'body'=>$body], function($message) use ($request){
            $message->from('noreply@gmail.com', 'SIKORPRI');
            $message->to($request->email, 'Penerima')
                    ->subject('Reset-Password');
        });

        return back()->with('success', 'Kami telah mengirimkan link untuk me-Reset password!');
    }

    public function showResetform(Request $request, $token = null){
        return view('forgotpassword.reset')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $check_token = \DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            User::where('email', $request->email)->update([
                    'password'=> \Hash::make($request->password)   
                ]);
            
            \DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect('/login')->with('info', 'Password anda sudah diperbarui. Silahkan login!')->with('verifiedEmail', $request->email);
        }


    }

}
