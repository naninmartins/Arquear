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
            $table->string('fantasy_name')->nullable(true);
            $table->string('social_reason')->nullable(true);
            $table->string('cpf',14)->nullable(true);
            $table->string('cnpj',18)->nullable(true);
            $table->string('email',60);
            $table->string('phone1',15);
            $table->string('phone2',15)->nullable(true);
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
