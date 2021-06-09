<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property', function (Blueprint $table) {
            $table->id('property_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('unit_number');
            $table->string('city');
            $table->string('town');
            $table->text('address');
            $table->string('gps_location')->unique();
            $table->unsignedBigInteger('type')->nullable();
            $table->integer('rent');
            $table->boolean('is_rent_negotiable');
            $table->integer('advance');
            $table->boolean('is_advance_negotiable');
            $table->string('contact_phone_number');
            $table->boolean('is_property_available')->default(1);
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('type')
                    ->references('property_type_id')
                    ->on('property_type')
                    ->onUpdate('cascade')
                    ->onDelete('set null');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('property');
    }
}
