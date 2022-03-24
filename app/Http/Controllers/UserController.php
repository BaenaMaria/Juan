<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use App\Models\User;

class UserController extends Controller
{
    public function vistaEmail(){
        return view('vistaEmail');
    }

    public function store(CreateUser $request){
        $user = User::create($request->all());
        $user->save();
    }
}
