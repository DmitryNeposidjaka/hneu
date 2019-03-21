<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Models\Product;
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

    public function create(AdminUserCreateRequest $request)
    {
        $product = new Product($request->all());
        $product->save();
        return $product;
    }

    public function update(AdminUserUpdateRequest $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    public function delete(Product $product)
    {
        return (string) $product->delete();
    }
}