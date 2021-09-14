<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('street');
            $table->integer('number');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->enum('status', ['available']);
            $table->enum('type', ['flat/apartment', 'house']);
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->enum('condition', ['new', 'good']);
            $table->enum('equipment', ['furnished', 'unfurnished']);
            $table->integer('room');
            $table->integer('bath');
            $table->integer('size');
            $table->integer('price');
            $table->boolean('pet');
            $table->boolean('garden');
            $table->boolean('air_conditioning');
            $table->boolean('swimming_pool');
            $table->boolean('terrace');
            $table->string('image');
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
        Schema::dropIfExists('properties');
    }
}
