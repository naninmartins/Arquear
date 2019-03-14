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
        'state',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo('App\Person');
    }
}
