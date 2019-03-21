<?php

namespace App\Models\Buildings;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'area',
    ];

    public function person()
    {
        return $this->belongsTo('App\Models\People\Person');
    }

    public function adress()
    {
        return $this->hasOne('App\Models\Adresses');
    }
}
