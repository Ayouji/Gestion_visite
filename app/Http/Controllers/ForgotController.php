<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    public function forgot(){
        return view('auth.forgot_password');
    }
    public function forgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins'
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
            ]);
        Mail::send("emails.forgotPassword", ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject("Reset Password");
         });
         return redirect()->to(route('auth.forgot'))->with('success', 'We have send link reset password in your e-mail');
    }
    public function resetPassword($token){
        return view('auth.newPassword', compact('token'));
    }
    public function resetPasswordPost(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
            ]);
            $update_password = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token
            ])->first();
            if(!$update_password){
                return redirect()->to(route('auth.forgot'))->with('message', 'Invalid token');
            }
            Admin::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            return redirect()->to(route('auth.create'))->with('success', 'Password reset successfully');

    }

}

