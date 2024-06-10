<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "body", "published_at"];
    protected $dates = ["published_at"];

    public static function booting(): void
    {
        static::saving(function ($model) {
            $model->slug = Str::of($model->title)->slug("-");
        });
    }

    public function isPublished(): bool
    {
        return $this->published_at != null;
    }
}
