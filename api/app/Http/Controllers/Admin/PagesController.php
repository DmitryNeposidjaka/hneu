<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PageCreateRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAll()
    {
        return Page::filter(json_decode($this->request->input('filters'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getUser(Page $page)
    {
        return $page;
    }

    public function create(PageCreateRequest $request)
    {
        $page = new Page($request->all());
        $page->save();
        return $page;
    }

    public function update(PageCreateRequest $request, Page $page)
    {
        $page->update($request->all());
        return $page;
    }

    public function delete(Page $page)
    {
        return (string) $page->delete();
    }
}