<?php

namespace App\Models\People;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = [
        'name',
        'fantasy_name',
        'social_reason',
        'cpf',
        'cnpj',
        'email',
        'phone1',
        'phone2',
        'male_female',
        'active',
        'register_date',
        'register_birthday',
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
