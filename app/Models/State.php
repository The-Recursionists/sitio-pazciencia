<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'country_id',
        'country_code',
        'state_code',
        'type',
        'latitude',
        'longitude',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
