<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.index', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('user.edit');
    }

    public function update(User $user)
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'unique:users,email,' . $user->id]
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        $user->save();
        return view('user.index', ['user' => $user]);
    }

    public function annonce(User $user)
    {
        return view('user.annonces', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/');
    }
}
