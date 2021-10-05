<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
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
        'iso3',
        'iso2',
        'phone_code',
        'phone_code',
        'capital',
        'currency',
        'currency_symbol',
        'tld',
        'native',
        'region',
        'subregion',
        'timezones',
        'latitude',
        'longitude',
        'emojiU',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
