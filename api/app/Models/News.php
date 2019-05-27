<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use Filterable;

    protected $fillable = ['title', 'description', 'content', 'lang', 'link', 'type', 'images'];

    protected $with = [
        'categories'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected $hidden = [
        'entity', 'creator_id'
    ];

    protected $appends = [
        'thumbnails'
    ];

    public function getThumbnailAttribute($value)
    {
        return Storage::disk('news-img')->url($value);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,
            'news_categories',
            'news_id',
            'category_id',
            'id',
            'id'
        );
    }

    public function getThumbnailsAttribute($value)
    {
        $result = [];
        foreach ($this->images as $image) {
            $result[] = Storage::disk('news-img')->url($image);
        }
        return $result;
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
            $created = Category::firstOrCreate(['name' => $category, 'type' => 'news']);
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
                'news-img');
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
                \Storage::disk('news-img')->url($image),
                $updated
            );
        } );
    }
}