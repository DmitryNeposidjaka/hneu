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
}