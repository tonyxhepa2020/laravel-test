<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Serie extends Model
{
    use HasFactory;

    use HasSlug;

    protected $fillable = [
        'tmdb_id',
        'name',
        'poster_path',
        'created_year'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class)->latest();
    }
}
