<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('users/list', ["users" => $users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users/edit', ["user" => $user]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return Redirect::to('/users');
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();
        return Redirect::to('/users');
    }
}
