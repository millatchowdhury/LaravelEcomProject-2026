<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token){
        $user = User::where('remember_token', $token)->first();
        if(!is_null($user)){
            $user->status = 1;
            $user->remember_token = NULL;
            $user->save();
            session()->flash('success', 'You are registered successfully !! Login Now');
            return redirect('login');
        }else{
            session()->flash('erros', 'Sorry !! Your token is not matched !!..');
            return redirect('/');
        }
    }
}
