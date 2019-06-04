<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAll()
    {
        return Product::filter(json_decode($this->request->input('filters'), true))->paginate($this->request->input('per_page', 50));
    }

    public function getProduct(Product $product)
    {
        return $product;
    }

    public function getAllCategories()
    {
        return Category::where(['type' => 'product'])->get();
    }

    public function create(ProductCreateRequest $request)
    {
        $product = new Product($request->only(['title', 'description', 'link', 'lang', 'price']));
        $product->creator_id = Auth::id();
        $product->entity = User::class;
        $product->setImages($request->file('thumbnails', []));
        $product->save();
        $product->setCategories($request->input('categories', []));

        return $product;
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->only(['title', 'description', 'images', 'lang', 'link', 'price']));
        $product->setImages(
            $request->thumbnails?? []
        );

        $product->save();
        $product->setCategories($request->input('categories', []));

        return $product;
    }

    public function delete(Product $product)
    {
        return (string)$product->delete();
    }
}