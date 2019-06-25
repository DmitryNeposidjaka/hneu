<?php

namespace App\Http\Controllers\Admin;


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
        return News::filter(json_decode($this->request->input('filters'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getItem(News $item)
    {
        return $item;
    }

    public function getAllCategories()
    {
        return Category::where(['type' => 'news'])->get();
    }

    public function create(NewsCreateRequest $request)
    {
        $item = new News($request->only(['title', 'description', 'content', 'lang', 'link', 'type']));
        if ($request->has('thumbnail')) {
            $path = $request->file('thumbnail')
                ->storeAs(
                    'images',
                    uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $request->thumbnail->extension(),
                    'news-img');
            $item->thumbnail = $path;
        }
        $item->creator_id = Auth::id();
        $item->entity = User::class;
        $item->setImages($request->file('thumbnails', []));
        $item->save();
        $item->setCategories($request->input('categories', []));
        return $item;
    }

    public function update(NewsUpdateRequest $request, News $item)
    {
        $item->update($request->only(['title', 'description', 'content', 'lang', 'link', 'type']));

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')
                ->storeAs(
                    'images',
                    uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $request->thumbnail->extension(),
                    'news-img');
            $item->thumbnail = $path;
        }
        $item->setImages(
            $request->thumbnails ?? []
        );
        $item->save();
        $item->setCategories($request->input('categories', []));
        return $item;
    }

    public function delete(News $item)
    {
        return (string)$item->delete();
    }
}