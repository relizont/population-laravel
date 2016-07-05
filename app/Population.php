<?php

namespace App;

use App\Country;
use App\City;
use App\Type;
use App\Gender;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'population';

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'country_id' => 'int',
        'city_id' => 'int',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
