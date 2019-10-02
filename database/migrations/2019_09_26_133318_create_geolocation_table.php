<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeolocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocation', function (Blueprint $table) {
            $table->integer('chapa')->nullable();
            $table->string('name',100)->nullable();
            $table->string('job_description')->nullable();
            $table->string('zip_code',15)->nullable();
            $table->string('street',100)->nullable();
            $table->integer('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood',100)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('city',150)->nullable();
            $table->integer('section_code')->nullable();
            $table->string('section_description')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geolocation');
    }
}
