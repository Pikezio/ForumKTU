<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function follow($id){
        $user = Auth::user();
        $user = User::findOrFail($id);
        $user->following()->attach($user->id);
        return back();
    }

    public function following(){
        $user = Auth::user();
        $user = $user->following()->get();
        // Pasikeisk i custom puslapi
        //dd($user);
        return view('users.following', ['themes' => $user]);
    }
}
