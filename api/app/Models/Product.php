<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use Filterable;

    protected $fillable = [
        'title', 'description'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected $with = [
        'categories'
    ];

    public function getThumbnailAttribute($value)
    {
        return Storage::disk('news-img')->url($value);
    }

    public function getImagesAttribute($value)
    {
        $result = [];
        foreach (json_decode($value, true) as $image) {
            $result[] = Storage::disk('products-img')->url($image);
        }
        return $result;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'products_categories',
            'product_id',
            'category_id',
            'id',
            'id'
        );
    }

    public function setCategories(array $data)
    {
        $new = array_filter($data, function ($item) {
            return !is_numeric($item);
        });
        $categories = array_filter($data, function ($item) {
            return is_numeric($item);
        });
        $created = $this->createCategories($new);
        $update = array_merge($categories, $created);

        $this->categories()->sync($update);
    }


    private function createCategories(array $data)
    {
        $result = [];
        foreach ($data as $category) {
            $created = Category::firstOrCreate(['name' => $category, 'type' => 'product']);
            $result[] = $created->id;
        }
        return $result;
    }

    public function setImages(array $data)
    {
        $new = [];
        foreach ($data as $image) {
            $path = $image->storeAs(
                'images/products',
                uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $image->extension(),
                'products-img');
            $new[] = $path;
        }
        $this->images = array_merge($this->images, $new);
    }
}