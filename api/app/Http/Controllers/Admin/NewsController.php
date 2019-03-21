<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewsController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAll()
    {
        return News::filter(json_decode($this->request->input('filters'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getItem(News $item)
    {
        return $item;
    }

    public function create(AdminUserCreateRequest $request)
    {
        $item = new News($request->all());
        $item->save();
        return $item;
    }

    public function update(AdminUserUpdateRequest $request, News $item)
    {
        $item->update($request->all());
        return $item;
    }

    public function delete(News $item)
    {
        return (string) $item->delete();
    }
}