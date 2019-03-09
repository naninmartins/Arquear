<?php

use Illuminate\Database\Seeder;
use App\Models\People\Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\People\Person::class, 10)->create();
    }
}
