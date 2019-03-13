<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('fantasy_name');
            $table->string('social_reason');
            $table->string('cpf',11);
            $table->string('cnpj',14);
            $table->string('email',60);
            $table->string('phone1',12);
            $table->string('phone2',12);
            $table->string('male_female',1);
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
