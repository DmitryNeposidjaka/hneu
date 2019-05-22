<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\TemporaryStorageImageRequest;
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
        return User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['admin', 'superadmin']);
        })->filter(json_decode($this->request->input('filters'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getUser(User $user)
    {
        return $user;
    }

    public function create(AdminUserCreateRequest $request)
    {
        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $path = $request->file('thumbnail')
            ->storeAs(
                'images',
                uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $request->thumbnail->extension(),
                'user-img');
        $user->thumbnail = $path;
        $user->save();
        \Bouncer::assign($request->role)->to($user);
        return $user;
    }

    public function update(AdminUserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')
                ->storeAs(
                    'images',
                    uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $request->thumbnail->extension(),
                    'user-img');
            $user->thumbnail = $path;
            $user->save();
        }
        return $user;
    }

    public function delete(User $user)
    {
        return (string) $user->delete();
    }

    public function saveThumbnail(TemporaryStorageImageRequest $request)
    {

    }
}