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

    public function adress()
    {
        return $this->hasOne('App\Models\Adresses');
    }

    public function updateCpfCnpj ($request)    {

        if (strlen($request['cpf_cnpj']) == 14) {

            $request['cpf'] = $request['cpf_cnpj'];
            $request['cnpj'] = NULL;
        }
        else{
            $request['cnpj'] = $request['cpf_cnpj'];
            $request['cpf'] = NULL;
        }
        return $request;
    }

}
