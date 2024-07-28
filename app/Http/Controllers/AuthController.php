<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller


{

    public function login(){
        return view('login');
    
    }
    public function loginPost(Request $request){
        $credetials=[
            'email'=> $request->email,
            'password' => $request->password,

        ];
        if(Auth::attempt( $credetials)){
            return redirect('/home')->with('success','Login successfull');
        }
        return back()->with('error','Error Email or Password');
        
    }


    public function register(){
        return view('register');

    }
    public function registerPost(Request $request){

        // dd($request->all());
        $request-> validate([
            'name' => 'required | min:3',
            'email' => 'required | email',
            'password'=> 'required | min:8',
        ]);
        $user = new User();

        $user-> name= $request->name;
        $user-> email= $request->email;
        $user-> password= Hash::make($request->password);
        $user-> save();

        return back()->with('success','Register Successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
