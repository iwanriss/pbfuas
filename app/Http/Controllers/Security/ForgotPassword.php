<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use sentinel;
use Reminder;
use App\User;
use Mail;
class ForgotPassword extends Controller
{
    public function forgot(){
        return view ('auth.passwords.forgot');
    }

    public function password(Request $request){
        $user = User::whereEmail($request->emaill)->first();

        if (count($user)== 0 ){
            return redirect()-> back ()->with(['eror' => 'Email no exists']);
        }
        $user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user,$reminder->code);

        return redirect ()-> back()->with(['success' => 'Reset code sent to your email.']);
    }
    public function sendEmail($User, $code){
        Mail::send(
            'email.forgot',
            ['user' => $user, 'code'=> $code],
            function($message) use ($user){
                $message->to($user->email);
                $message->subject("hello $user->name", "reset your password.");
            }
        );
    }
}
