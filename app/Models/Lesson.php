<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Lesson extends Model
{
    use HasFactory;
    use HasStatuses;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'references'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::saved(function (Lesson $lesson) {
            $lesson->setStatus('pendiente');
        });

        static::deleted(function (Lesson $lesson) {
            $status = $lesson->statuses;
            $lesson->deleteStatus($status);
        });
    }

}
