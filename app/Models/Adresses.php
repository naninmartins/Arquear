<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    protected $fillable = [
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'postal_code',
    ];

    public function person()
    {
        return $this->hasOne('App\Models\People\Person');
    }
}
