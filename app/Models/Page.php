<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => 'array',
        'content' => 'array',
    ];
    
    protected $fillable = [
        'name', 'slug', 'content', 'image', 'banner', 'sort', 'page_id', 'position',
    ];

    public function childs()
    {
        return $this->hasMany(Page::class);
    }

    public function parent()
    {
        return $this->hasOne(Page::class);
    }
}
