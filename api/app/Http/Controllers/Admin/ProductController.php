<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserCreateRequest;
use App\Http\Requests\AdminUserUpdateRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
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

    public function create(ProductCreateRequest $request)
    {
        $product = new Product($request->only(['title', 'description']));
        $product->creator_id = Auth::id();
        $product->entity = User::class;
        $product->images = $this->setImages($request->file('thumbnails'));
        $product->save();

        return $product;
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->only(['title', 'description']));
        $product->images = $this->setImages($request->file('thumbnails'));
        $product->save();

        return $product;
    }

    public function delete(Product $product)
    {
        return (string)$product->delete();
    }

    /**
     * @param $images
     * @return false|null|string
     */
    private function setImages($images)
    {
        $result = [];

        foreach ($images as $image) {
            $path = $image->storeAs(
                'images/products',
                uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $image->extension(),
                'products-img');
            $result[] = $path;
        }

        return !empty($result) ? json_encode($result) : null;
    }
}