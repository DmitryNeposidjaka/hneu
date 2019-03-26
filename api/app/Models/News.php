<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use Filterable;

    protected $fillable = ['title', 'description', 'content'];

    public function getThumbnailAttribute($value)
    {
        return Storage::disk('news-img')->url($value);
    }
}