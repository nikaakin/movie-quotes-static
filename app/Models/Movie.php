<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
    use HasFactory;
    use HasTranslations;

    public $guarded = [];

    protected $casts = [
        'title' => 'array'
    ];

    public $translatable = ['title'];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class, "movie_id");
    }
}
