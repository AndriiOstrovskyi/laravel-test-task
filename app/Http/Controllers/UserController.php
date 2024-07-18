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
            return $this->successResponse(['users' => $users]);
        } else {
            return $this->errorResponse(__('Permission denied'), 401);
        }
    }

    public function show(User $user)
    {
        if(Auth::user()->can('view', $user)){
            return response()->json(['user' => $user], 200);
            return $this->successResponse(['user' => $user]);
        } else {
            return $this->errorResponse(__('Permission denied'), 401);
        }
    }

    public function update(UserRequest $request, User $user)
    {
        if(Auth::user()->can('update', $user) && $user->role !== 'admin') {
            $user->fill($request->validated());
            $user->save();
            return $this->successResponse(['user' => $user]);
        } else {
            return $this->errorResponse(__('Permission denied'), 401);
        }
    }

    public function destroy(User $user)
    {
        if(Auth::user()->can('delete', $user) && $user->role !== 'admin') {
            $user->delete();
            return $this->successResponse(['message' => __('User deleted')]);
        } else {
            return $this->errorResponse(__('Permission denied'), 401);
        }
    }
}
