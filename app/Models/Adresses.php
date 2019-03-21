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
        return $this->belongsTo('App\Models\People\Person');
    }

    public function building()
    {
        return $this->belongsTo('App\Models\Buildings\Building');
    }
}
