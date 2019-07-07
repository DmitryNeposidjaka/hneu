<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use Filterable;

    protected $fillable = [
        'title', 'description', 'lang', 'images', 'link', 'price'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'float'
    ];

    protected $with = [
        'categories'
    ];
    protected $appends = [
        'thumbnails',
        'web_link'
    ];

    public function getThumbnailsAttribute($value)
    {
        $result = [];
        foreach ($this->images as $image) {
            $result[] = Storage::disk('products')->url($image);
        }
        return $result;
    }

    public function getWebLinkAttribute()
    {
        return route('product', [app()->getLocale(), $this->attributes['link']]);
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
        $old = $this->images ?? [];
        $files = array_filter($data, [$this, 'getNewFiles']);

        foreach ($files as $image) {
            $path = $image->storeAs(
                'images',
                uniqid() . '.' . \Carbon\Carbon::now()->format('Y-m-d_H:i:s') . '.' . $image->extension(),
                'products');
            $new[] = $path;
        }

        $stored = $this->syncImages($old, $data);
        $this->images = array_merge($stored, $new);
    }

    private function getNewFiles($data)
    {
        return $data instanceof UploadedFile;
    }

    private function syncImages($stored, $updated)
    {
        return array_filter($stored, function ($image) use ($updated) {
            return in_array(
                \Storage::disk('products')->url($image),
                $updated
            );
        } );
    }

}