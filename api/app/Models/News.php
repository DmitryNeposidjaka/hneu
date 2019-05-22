<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use Filterable;

    protected $fillable = ['title', 'description', 'content', 'lang', 'link', 'type'];

    protected $with = [
        'categories'
    ];

    protected $hidden = [
        'entity', 'creator_id'
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
}