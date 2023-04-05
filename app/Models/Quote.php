<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quote extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $casts = [
         "quote" => 'array'
    ];

    public $translatable = ['quote'];

    protected $guarded = [];

    public function movie()
    {
        return $this->belongsTo(Movie::class, "movie_id");
    }
}
