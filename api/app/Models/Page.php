<?php

namespace App\Models;


use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use Filterable;

    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'lang', 'title', 'link', 'menu', 'content'
    ];

    protected $casts = [
        'menu' => 'array',
    ];
}