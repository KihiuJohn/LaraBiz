<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'parent_id',
        'title',
        'slug',
        'category',
        'image',
        'location',
        'trainer',
        'duration',
        'price',
        'start_date',
        'short_description',
        'long_description',
        'key_topics',
        'learning_outcomes',
    ];

    protected $casts = [
        'key_topics' => 'array',
        'learning_outcomes' => 'array',
        'start_date' => 'date',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
