<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'array',
        'content' => 'array',
        'address' => 'array',

    ];
        protected $fillable = [
            'name', 'page_id', 'content', 'image', 'price', 'period', 'price_metter', 'number_of_floors',
            'number_of_flats', 'size', 'year_of_build', 'address', 'rooms', 'badrooms', 'garage', 'gas',
            'evelador', 'floor', 'hot', 'slug', 

        ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
