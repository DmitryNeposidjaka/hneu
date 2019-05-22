<?php

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
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
        return News::filter(json_decode($this->request->input('filters', '[]'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getItem(News $item)
    {
        return $item;
    }

    public function getAllCategories()
    {
        return Category::where(['type' => 'news'])->get();
    }
}