<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'page_title',
        'page_description',
        'main_heading',
        'main_content',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'meta_title',
        'meta_description',
        'is_published',
    ];
}