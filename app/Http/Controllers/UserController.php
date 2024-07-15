<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function show(Request $request){
      $user = [
        'email'=>$request->email,
        'password'=>$request->password,
      ];
      if(Auth::attempt($user)){
        return  redirect(route('Home.index'));
      }
    }
    public function logout(){
        Auth::logout();
        return  redirect(route('Home.index'))->with('success', 'da dang xuat');
    }
  
  }