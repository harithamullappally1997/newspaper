<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'description',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}