<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request)
    {
        $id = $request->user_id;
        $user = User::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);
        return redirect("/users/$id");
    }

    public function destroy(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::findOrFail($user_id);
        $user->delete();
    }

    public function userCars()
    {
        $user = Auth::user();

        return view('users.index', [
            'user' => $user
        ]);
    }
}
