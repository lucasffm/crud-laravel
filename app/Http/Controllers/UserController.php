<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $query = User::orderBy('id', 'asc');
        $model = new User();
        $available_fields = $model->getFillable();

        foreach ($request->query() as $key => $value) {
            if (!is_null($value) && in_array($key, $available_fields)) {
                $query = $query->where($key, 'ILIKE', '%' . $value . '%');
            }
        }

        $users = $query->get();
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
