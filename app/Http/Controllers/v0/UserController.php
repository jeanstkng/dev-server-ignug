<?php

namespace App\Http\Controllers\v0;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::create([
            'name' => 'Jose',
            'email' => 'test2@test.com',
            'password' => Hash::make('123'),
        ]);
    }


}
