<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getMe()
    {
        return Auth::user();
    }

    public function getAll()
    {
        return User::paginate($this->request->input('per_page', 50));
    }

    public function getUser(User $user)
    {
        return $user;
    }

    public function create(AdminUserCreateRequest $request)
    {
        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return $user;
    }

    public function update(AdminUserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}