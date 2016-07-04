<?php

namespace App;

use App\City;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $fillable = ['name'];

    /**
     * Get all of the cities for the user.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
