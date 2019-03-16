<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street',60)->index();
            $table->string('number',6)->nullable(true);
            $table->string('complement',100)->nullable(true);
            $table->string('postal_code',8);
            $table->string('neighborhood',14);
            $table->string('city');
            $table->string('state');
            $table->integer('people_id')->unsigned();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
