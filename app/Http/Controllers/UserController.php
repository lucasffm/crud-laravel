<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users/list', ["users" => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users/edit', ["user" => $user]);
    }
}
