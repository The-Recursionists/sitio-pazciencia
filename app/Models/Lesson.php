<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'video_url',
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
