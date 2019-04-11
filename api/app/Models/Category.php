<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'name', 'type'
    ];

    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(Product::class,
            'products_categories',
            'category_id',
            'product_id',
            'id',
            'id'
        );
    }

    public function news()
    {
        return $this->belongsToMany(News::class,
            'news_categories',
            'category_id',
            'news_id',
            'id',
            'id'
        );
    }
}