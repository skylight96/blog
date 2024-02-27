<?php

namespace App\Models;

use App\Enums\Status;
use App\Enums\Category;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'status',
        'category',
        'user_id',
    ];

    protected $casts = [
        'status' => Status::class,
        'category' => Category::class,
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}

