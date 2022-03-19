<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
class UserController extends Controller
{
    public function fetch(){
        $users = User::all();
        $response = [
            'users' => $users
        ];
        return response($response, 201);
    }
}
