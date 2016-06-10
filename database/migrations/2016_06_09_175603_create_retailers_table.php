<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('country')->default('US');
            $table->string('meta_description');
            $table->string('layout')->default('blog.layouts.index');
            $table->boolean('reverse_direction');
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
        Schema::drop('retailers');
    }
}
