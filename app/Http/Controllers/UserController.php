<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {   
        if(Auth::user()->can('viewAny', User::class)){
            $users = User::all();
            return response()->json(['users' => $users], 200);
        } else {
            return response()->json(['message' => 'Permission denied'], 401);
        }
    }

    public function show(User $user)
    {
        if(Auth::user()->can('view', $user)){
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => 'Permission denied'], 401);
        }
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return responce()->json(['user' => $user], 200);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
    }


}
