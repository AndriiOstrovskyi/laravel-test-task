<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
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
            return response()->json(['message' => __('Permission denied')], 401);
        }
    }

    public function show(User $user)
    {
        if(Auth::user()->can('view', $user)){
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => __('Permission denied')], 401);
        }
    }

    public function update(UserRequest $request, User $user)
    {
        if(Auth::user()->can('update', $user) && $user->role !== 'admin') {
            if($request->name) {
                $user->name = $request->name;
            }
            if($request->email) {
                $user->email = $request->email;
            }
            $user->save();
        } else {
            return response()->json(['message' => __('Permission denied')], 401);
        }

        return response()->json(['user' => $user], 200);
    }

    public function destroy(User $user)
    {
        if(Auth::user()->can('delete', $user) && $user->role !== 'admin') {
            $user->delete();
        } else {
            return response()->json(['message' => __('Permission denied')], 401);
        }
        
        return response()->json(['message' => __('User deleted')], 200);
    }
}
