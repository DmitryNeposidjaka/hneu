<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class News
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder message()
 * @method static \Illuminate\Database\Eloquent\Builder article()
 * @method static \Illuminate\Database\Eloquent\Builder advertising()
 */
class News extends Model
{
    use Filterable;

    protected $fillable = ['title', 'description', 'content', 'lang', 'link', 'type', 'images'];

    protected $with = [
        'categories', 'creator'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected $hidden = [
        'entity', 'creator_id'
    ];

    protected $appends = [
        'thumbnails',
        'web_link'
    ];

    public function getThumbnailAttribute($value)
    {
        if (is_null($this->attributes['thumbnail'])) {
            return null;
        }
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

    public function creator()
    {
        return $this->hasOne(User::class, 'id', 'creator_id');
    }

    public function getThumbnailsAttribute($value)
    {
        $result = [];
        if (!$this->images) return $result;

        foreach ($this->images as $image) {
            $result[] = Storage::disk('news-img')->url($image);
        }
        return $result;
    }

    public function setLinkAttribute($value)
    {
        $this->attributes['link'] = urlencode($value);
    }

    public function getWebLinkAttribute()
    {
        return route($this->attributes['type'], [app()->getLocale(), $this->attributes['link']]);
    }

    /**
     * @param array $data
     * @return void
     */
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

    /**
     * @param array $data
     * @return array
     */
    private function createCategories(array $data)
    {
        $result = [];
        foreach ($data as $category) {
            $created = Category::firstOrCreate(['name' => $category, 'type' => 'news']);
            $result[] = $created->id;
        }
        return $result;
    }

    /**
     * @param array $data
     */
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

    /**
     * @param $data
     * @return bool
     */
    private function getNewFiles($data)
    {
        return $data instanceof UploadedFile;
    }

    /**
     * @param $stored
     * @param $updated
     * @return array
     */
    private function syncImages($stored, $updated)
    {
        return array_filter($stored, function ($image) use ($updated) {
            return in_array(
                \Storage::disk('news-img')->url($image),
                $updated
            );
        });
    }


    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeArticle($query)
    {
        return $query->where('type', 'article');
    }


    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdvertising($query)
    {
        return $query->where('type', 'advertising');
    }


    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMessage($query)
    {
        return $query->where('type', 'message');
    }
}